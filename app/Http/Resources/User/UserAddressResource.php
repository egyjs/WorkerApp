<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class UserAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'street_name'=>$this->street_name,
            'type'=>(int) $this->type,
            'building_name'=>$this->building_name,
            'office_name'=>$this->office_name,
            'building_no'=>$this->building_no,
            'floor_no'=>$this->floor_no,
            'details'=>$this->details,
            'postal_code'=>$this->postal_code,
            'phone'=>'+'.$this->phone_code.$this->phone,
            'primary'=>(boolean)$this->primary,
//            'country' =>$this->country,
//            'state'   =>$this->state,
//            'city'    =>$this->city,
            'created_at'=>$this->created_at
        ];
    }
}
