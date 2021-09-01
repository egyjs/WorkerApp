<?php

namespace App\Http\Controllers\API\Worker;

use App\Http\Controllers\Controller;

use App\Interfaces\Worker\IssueInterface;
use App\Interfaces\User\UserInterface;
use App\Http\Requests\API\Worker\{AssignJobsRequest, AssignScheduleRequest, RejectIssueRequest};
use App\Http\Resources\Worker\WorkerResource;
use App\Interfaces\Worker\WorkerInterface;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    protected $userInterface;
    protected $issueInterface;

    public function __construct(IssueInterface $issueInterface)
    {
//        $this->userInterface = $userInterface;
        $this->issueInterface = $issueInterface;
    }

    public function issueReject(RejectIssueRequest $request)
    {
        return $this->issueInterface->reject($request);
    }

}
