<?php

namespace App\Observers\User;

use App\Models\User\UserIssue;
use App\Notifications\Worker\NewIssue;
use Illuminate\Support\Facades\Log;
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
        try{
            Notification::send($userIssue->worker, new NewIssue($userIssue));
        }catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Handle the UserIssue "updated" event.
     *
     * @param UserIssue $userIssue
     * @return void
     */
    public function updated(UserIssue $userIssue)
    {

        try{
            // todo: notify user that we are searching for another worker
            //  also check if update is about changing the worker if(oldWorker->id == currentWorker when there is a rejectedIssue with oldWorker->id)
            //            return $this->success('please wait, we send your request to Another Garry', new UserIssueResource($issue));



            if ($userIssue->wasChanged('more_info')){
                // todo: notify user that worker `need more information`
            }

        }catch (\Exception $e) {
            Log::error($e->getMessage());
        }
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
