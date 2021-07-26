<?php

namespace App\Http\Resources\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class JobResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection->map(function ($item) {
            return [
                'id'=>$item->id,
                'name'=>$item->name,
                'description'=>$item->description,
                'type'=>(int) $item->type,
                'parent_job'=> $item->parent,
                'required_cert'=> (bool) $item->required_cert,
            ];
        });
    }
}
