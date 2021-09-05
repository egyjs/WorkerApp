<?php

namespace App\Http\Resources\User\Issue;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $worker_id
 * @property mixed $description
 * @property mixed $status
 * @property array $more_info
 * @property array $files
 * @property datetime $updated_at
 * @property datetime $created_at
 * @property int $job_id
 * @property int $user_id
 * @property int $id
 * @property int $user_address_id
 */
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
            "id" => $this->id,
            "worker_id" => $this->worker_id,
            "user_id" => (int) $this->user_id,
            "user_address_id" => (int) $this->user_address_id,
            "job_id" => (int) $this->job_id,
            "date" => $this->date,
            "time_from" => $this->time_from,
            "time_to" => $this->time_to,
            "description" => $this->description,
            "status" => $this->status,
            "files" => new UserIssueFilesResource($this->files),

            "more_info" => $this->more_info,

            "updated_at" => $this->updated_at,
            "created_at" => $this->created_at,
        ];
    }
}
