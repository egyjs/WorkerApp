<?php

namespace App\Http\Resources\Worker;

use App\Http\Resources\Common\WorkerJobResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $email = Str::contains($this->email,'@garry.com')?null:$this->email;
        return [
            'id' => $this->id,

            'name' => $this->firstname.' '.$this->lastname,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,

            'phone'=>$this->phone,
            'phone_verified_at'=>$this->phone_verified_at,

            'email' => $email,
            'email_verified_at'=>$this->email_verified_at,
            'photo'=>storageAsset($this->photo),

            'driver_license'=>$this->driver_license,
            'driver_license_photo'=>storageAsset($this->driver_license_photo),

            'balance'=> $this->balance ?? 0,
            'rate'=> $this->rate,
            'status'=> $this->status,

            'country' => $this->country,
            'state'   => $this->state,
            'city'    => $this->city,

            'jobs'=> new WorkerJobResource($this->jobs),
            'schedules'=> $this->schedules,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
