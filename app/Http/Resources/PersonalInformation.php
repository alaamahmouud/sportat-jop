<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalInformation extends JsonResource
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
            'user' => [
                'first_name' => $this->first_name ,
                'last_name' => $this->last_name ,
                'country' => $this->country->name ?? null,
                'email' => $this->email ,
                'phone' => $this->phone ,
                'bio' => $this->bio ,
                'profile-image' => $this->attachmentRelation->where('usage','profile-image')->first()->path ?? null ,
                'd_o_b' => Carbon::parse($this->d_o_b)->format('d/m/Y'),
                'cover' => $this->attachmentRelation->where('usage','cover')->first()->path ?? null ,

            ],
            'token' =>
                $request->bearerToken()

        ];
    }
}
