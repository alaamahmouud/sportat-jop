<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->client->full_name ?? null,
            'client-image' => $this->client->attachmentRelation->where('usage','profile-image')->first()->path ?? null,
            'title' => $this->title,
            'created_at' => $this->created_at->format('d/m/Y'),
            'views' => $this->views->count() ,
            'videos' => $this->attachmentRelation->where('usage','video')->where('attachmentable_id',$this->id)->first()->path ?? null
        ];

    }
}
