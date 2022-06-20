<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Storage;

class TeamMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $extensions = explode('.',  $this->profile);
        $extensions = end($extensions);
        $dataImg = "data:".$extensions.";base64,";
        $dataImg .= base64_encode(Storage::get( $this->profile));

        return [
            'id' => $this->id,
            'name' => $this->name,
            'profile' => $this->profile,
            'dataImage' => $dataImg,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
