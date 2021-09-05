<?php

namespace App\Repositories\Worker;

use App\Helpers\DBHelpers;
use App\Helpers\StorageHelper;
use App\Http\Requests\{API\Common\MoreInfoRequest,
    API\User\CreateIssueRequest,
    API\User\StoreIssueRequest,
    API\Worker\RejectIssueRequest};
use App\Models\Common\RejectedIssue;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\{User\Issue\UserIssueResource, Worker\WorkerResource};
use App\Interfaces\Worker\IssueInterface;
use App\Models\User\{IssueFile, UserAddress, UserIssue};
use App\Models\Worker\Worker;
use App\Traits\ResponseAPI;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use function array_merge;

class IssueRepository implements IssueInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    protected $workerRepository;

    public function __construct(WorkerRepository $workerRepository)
    {
        $this->workerRepository = $workerRepository;
    }

    public function reject(RejectIssueRequest $request): \Illuminate\Http\JsonResponse
    {
        return DB::transaction(function () use ($request) {

            $oldWorker = $request->user();

            $sameRejected = RejectedIssue::where('user_issue_id', $request->user_issue_id)->where('worker_id',$oldWorker->id)->first();
            if ($sameRejected) return $this->errorNotAllowed('you already reject the issue');

            $issue = UserIssue::where('id', $request->user_issue_id)
                ->where('worker_id',$oldWorker->id)
                ->first();
            if (!$issue) return $this->errorNotAllowed();

            $filterData = $issue->filter_data;



            $rejectedIssueData = $request->validated();
            $rejectedIssueData['worker_id'] = $oldWorker->id;
            $rejectedIssueData['user_id'] = $issue->user_id;


            // forward issue to another worker
            // $filterData = [[filter],user_address_id,time_from,time_to,date,country_id,job_id,state_id,reject_workers]
            $anotherWorker = $this->workerRepository->findWorkerModelToCreateIssue($filterData)
                ->where('workers.id', '<>', $oldWorker->id)->first();

            // todo: check slots


            // update issue with new worker
            $issue->update([
                // relations
                'worker_id' => $anotherWorker->id,
                // data
                'reject_workers' => array_merge($issue->reject_workers, [$oldWorker->id]),
            ]);



            $rejectedIssue = RejectedIssue::create($rejectedIssueData);

            return $this->success('issue rejected successfully', $rejectedIssue);
        });

    }

    /**
     * @inheritDoc
     */
    public function moreInfo(MoreInfoRequest $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            $issue = UserIssue::where('id', $request->user_issue_id)->where('worker_id', $request->user()->id)->first();

            // check if issue not exist with worker id
            if (!$issue) return $this->errorNotAllowed();


            // check if there is question or answer exists
            if (isset($issue->more_info['Q']) and !isset($issue->more_info['A'])) return $this->success(__('Your question has already been sent to the client'),new UserIssueResource($issue));

            if (isset($issue->more_info['Q']) and isset($issue->more_info['A'])) return $this->success(__('It\'s already been answered by the client!'), new UserIssueResource($issue));


            // ask the question
            $issue->more_info = ['Q' => $request->question];


            // store the question
            $issue->save();


            /** fire @UserIssueObserver Observer */

            return $this->success( __('thanks.. we sent your question to the client'),new UserIssueResource($issue));
        });
    }
}
