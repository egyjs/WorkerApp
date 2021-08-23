<?php

namespace App\Http\Resources\User\Issue;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class UserIssueFilesResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection->map(function ($item) {
            return [
                'file' =>storageAsset($item->file),
                'type' => $item->type
            ];
        });

    }
}
