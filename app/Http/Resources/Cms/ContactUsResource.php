<?php

namespace App\Http\Resources\Cms;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'message_body' => $this->message_body,
            'replayed' => $this->replayed,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
