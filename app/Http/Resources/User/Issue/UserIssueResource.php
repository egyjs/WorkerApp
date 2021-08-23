<?php

namespace App\Http\Resources\User\Issue;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIssueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "worker_id" => $this->id,
            "user_id" => (int) $this->user_id,
            "user_address_id" => (int) $this->user_address_id,
            "job_id" => (int) $this->job_id,
            "date" => $this->date,
            "time_from" => $this->time_from,
            "time_to" => $this->time_to,
            "description" => $this->description,
            "status" => $this->status,
            "files" => new UserIssueFilesResource($this->files),

            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
        ];
    }
}
