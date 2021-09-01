<?php

namespace App\Repositories\User;

use App\Helpers\DBHelpers;
use App\Helpers\StorageHelper;
use App\Http\Requests\{API\User\CreateIssueRequest, API\User\StoreIssueRequest, API\Worker\RejectIssueRequest};
use App\Models\Common\RejectedIssue;
use App\Repositories\Worker\WorkerRepository;
use App\Http\Resources\{User\Issue\UserIssueResource, Worker\WorkerResource};
use App\Interfaces\User\IssueInterface;
use App\Models\User\{IssueFile, UserAddress, UserIssue};
use App\Models\Worker\Worker;
use App\Traits\ResponseAPI;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IssueRepository implements IssueInterface
{
    // Use ResponseAPI Trait in this repository
    use ResponseAPI;

    protected $workerRepository;
    public function __construct(WorkerRepository $workerRepository)
    {
        return $this->workerRepository = $workerRepository;
    }

    public function store(CreateIssueRequest $request)
    {
        $client = $request->user();
        $worker = Worker::with(['jobs'])->find($request->worker_id);
        $job = $worker->jobs->where('id', $request->job_id)->first();

        if (!$worker->isActive() && !$job->pivot->active) return $this->error('sorry.. this worker isn\'t active yet! ');

        // todo: check slots


        // store issue in db
        return DB::transaction(function () use ($request, $client, $worker, $job) {
            $issue = UserIssue::create([
                // relations
                'worker_id' => $worker->id,
                'user_id' => $client->id,
                'user_address_id' => $request->user_address_id,
                'job_id' => $job->id,

                'reject_workers' => $request->reject_workers,

                'filter_data' =>$request->all(),


                // data
                'date' => Carbon::parse($request->date),
                'time_from' => $request->time_from,
                'time_to' => $request->time_to,
                'description' => $request->description,
                //'name' => Str::title(Str::limit($request->description)),

                //
                'status' => 'PENDING',

            ]);

            if ($request->issue_files){
                $issueFilesData = [];
                foreach ($request->issue_files as $i => $file) {
                    $filetype = fType($file->getClientMimeType(), ['image', 'video', 'audio']);
                    if ($filetype) {
                        $issueFilesData[$i]['user_id'] = $client->id;
                        $issueFilesData[$i]['user_issue_id'] = $issue->id;
                        $issueFilesData[$i]['file'] = StorageHelper::saveAs(UserIssue::class, $file, 'issue_file');
                        $issueFilesData[$i]['type'] = $filetype;
                    }
                }
                $issueFiles = IssueFile::insert($issueFilesData);
            }



            return $this->success('please wait, we send your request to Garry', new UserIssueResource($issue));
        });

    }

    public function create(CreateIssueRequest $request)
    {

        $worker = $this->workerRepository
            ->findWorkerModelToCreateIssue($request->all())
            ->first();

        if (!$worker) return $this->error('sorry.. cant find any worker at this moment!, You may want to try searching for workers with a different specification', 404);

        return $this->success('we did find this worker for you: ' . $worker->id, new WorkerResource($worker));

    }

}
