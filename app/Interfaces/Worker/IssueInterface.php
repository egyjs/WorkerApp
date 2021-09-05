<?php

namespace App\Interfaces\Worker;

use App\Http\Requests\API\Common\MoreInfoRequest;
use App\Http\Requests\API\Worker\RejectIssueRequest;
use Illuminate\Http\JsonResponse;

interface IssueInterface
{
    public function reject(RejectIssueRequest $request);

    /**
     * @param MoreInfoRequest $request
     * @return jsonResponse
     */
    public function moreInfo(MoreInfoRequest $request): JsonResponse;
}
