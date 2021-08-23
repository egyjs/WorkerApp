<?php

namespace App\Observers\User;

use App\Models\User\UserIssue;
use App\Notifications\Worker\NewIssue;
use Illuminate\Support\Facades\Notification;

class UserIssueObserver
{

    public $afterCommit = true;

    /**
     * Handle the UserIssue "created" event.
     *
     * 1. notify @worker when there is a new issue.
     *
     *
     * @param UserIssue $userIssue
     * @return void
     */
    public function created(UserIssue $userIssue)
    {
        Notification::send($userIssue->worker, new NewIssue($userIssue));
    }

    /**
     * Handle the UserIssue "updated" event.
     *
     * @param UserIssue $userIssue
     * @return void
     */
    public function updated(UserIssue $userIssue)
    {
        //
    }

    /**
     * Handle the UserIssue "deleted" event.
     *
     * @param UserIssue $userIssue
     * @return void
     */
    public function deleted(UserIssue $userIssue)
    {
        //
    }

    /**
     * Handle the UserIssue "restored" event.
     *
     * @param UserIssue $userIssue
     * @return void
     */
    public function restored(UserIssue $userIssue)
    {
        //
    }

    /**
     * Handle the UserIssue "force deleted" event.
     *
     * @param UserIssue $userIssue
     * @return void
     */
    public function forceDeleted(UserIssue $userIssue)
    {
        //
    }
}
