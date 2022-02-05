<?php

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Resources\Json\JsonResource;

class Notification extends JsonResource
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
            'title' => $this->title,
            'body' => $this->content,
            'date' => $this->created_at->format('d/m/Y'),
            'time' => $this->created_at->format('h:i A'),
            'profile_image' => Client::where('id',$this->model_id)->first()->attachmentRelation->where('usage','profile-image')->first()->path ?? null

        ];
    }
}
