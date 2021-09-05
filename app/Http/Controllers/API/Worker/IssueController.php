<?php

namespace App\Http\Controllers\API\Worker;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\Common\MoreInfoRequest;
use App\Interfaces\Worker\IssueInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\API\Worker\{RejectIssueRequest};


class IssueController extends Controller
{
    protected $userInterface;
    protected $issueInterface;

    public function __construct(IssueInterface $issueInterface)
    {
//        $this->userInterface = $userInterface;
        $this->issueInterface = $issueInterface;
    }

    public function issuesReject(RejectIssueRequest $request)
    {
        return $this->issueInterface->reject($request);
    }

    /**
     * @param MoreInfoRequest $request
     * @return JsonResponse
     */
    public function issuesInfo(MoreInfoRequest $request): JsonResponse
    {
        return $this->issueInterface->moreInfo($request);
    }

}
