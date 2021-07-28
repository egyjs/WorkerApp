<?php


namespace App\Interfaces\User;



use App\Http\Requests\API\User\CreateIssueRequest;
use Illuminate\Support\Collection;

interface IssueInterface
{
    /**
     * get slots and every
     *
     * @request contains filter and what day user need the worker
     *
     * @return mixed slots of all available times in this day
     */
    public function create(CreateIssueRequest $request);
}
