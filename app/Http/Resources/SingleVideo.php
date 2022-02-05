<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleVideo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $checkGuard = \Auth::guard('clients')->user() ;
        return [
            'id' => $this->id,
            'name' => $this->client->full_name ?? $this->guest->email,
            'client-image' => $this->client->attachmentRelation->where('usage','profile-image')->first()->path ?? null,
            'title' => $this->title,
            'description' => $this->description ,
            'created_at' => $this->created_at->format('d/m/Y'),
            'views' => $this->views->count() ,
            'votes' => $this->upVotesCount(),
            'is_vote_client' =>\Auth::guard('clients')->user() == null ? false : \Auth::guard('clients')->user()->voted()->where('id',$this->id)->first() != null ? 1 : 0,
            'is_vote_guest' =>\Auth::guard('guest')->user() == null ? false : \Auth::guard('guest')->user()->voted()->where('id',$this->id)->first() != null ? 1 : 0,
            'tags' => $this->tags ,
            'videos' => $this->attachmentRelation->where('usage','video')->where('attachmentable_id',$this->id)->first()->path ?? null ,

            'comments' =>$this->comments->map(function ($key){
                return [
                    'comment_id' => $key->id ,
                    'content' => $key->content ,
                    'client_name' => $key->client->full_name ??  strstr($key->guest->email,'@',true) ,
                    'client_profile' => $key->client == null ? null : $key->client->attachmentRelation->where('usage','profile-image')->first()->path ?? null,
                    'date' => $this->created_at->format('d/m/Y'),
                    'time' => $this->created_at->format('h:i A')
                ];
            }) ,
        ];
    }
}
