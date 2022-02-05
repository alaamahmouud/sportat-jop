<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientProfile extends JsonResource
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
            'id' => $this->id ,
            'name' => $this->full_name ,
            'bio' => $this->bio ,
            'votes' => $this->upVoted()->count(),
            'views' => $this->videos == "[]" ? 0 : $this->videos[0]->views->count() ,
            'profile-image' => $this->attachmentRelation->where('usage','profile-image')->first()->path ?? null,
            'cover' => $this->attachmentRelation->where('usage','cover')->first()->path ?? null ,
            'videos' => VideoResource::collection($this->videos)->reverse()
            ];

    }
}
