<?php

namespace App\Http\Resources\APi\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentCollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
