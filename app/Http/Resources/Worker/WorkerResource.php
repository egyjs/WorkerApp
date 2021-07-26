<?php

namespace App\Http\Resources\Worker;

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
        $rate  = isNull($this->rate)? 4.5: $this->rate; // not using
        return [
            'id' => $this->id,

            'name' => $this->firstname.' '.$this->lastname,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone'=>$this->phone,
            'phone_verified_at'=>$this->phone_verified_at,
            'email' => $email,
            'email_verified_at'=>$this->email_verified_at,
            'photo'=>asset('storage/'.$this->photo),

            'driver_license'=>$this->driver_license,
            'driver_license_photo'=>asset('storage/'.$this->driver_license_photo),

            'balance'=> $this->balance,
            'rate'=> $this->rate,
            'status'=> $this->status,

            'country' =>$this->country,
            'state'   =>$this->state,
            'city'    =>$this->city,

            'jobs'=>$this->worker_jobs,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
