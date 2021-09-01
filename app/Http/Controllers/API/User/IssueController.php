<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\CreateIssueRequest;
use App\Http\Requests\API\User\StoreIssueRequest;
use App\Interfaces\User\IssueInterface;
use App\Interfaces\User\UserInterface;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    protected $userInterface;
    protected $issueInterface;

    public function __construct(UserInterface $userInterface,IssueInterface $issueInterface)
    {
        $this->userInterface = $userInterface;
        $this->issueInterface = $issueInterface;
    }

    public function create(CreateIssueRequest $request){
        return $this->issueInterface->create($request);
    }

    public function store(CreateIssueRequest $request){
        return $this->issueInterface->store($request);
    }
}
