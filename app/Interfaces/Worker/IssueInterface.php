<?php

namespace App\Interfaces\Worker;

use App\Http\Requests\API\Worker\RejectIssueRequest;

interface IssueInterface
{
    public function reject(RejectIssueRequest $request);
}
