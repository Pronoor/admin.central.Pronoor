<?php

namespace App\Http\Resources\Cms;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonilasResource extends JsonResource
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
            'quote' => $this->quote,
            'quotes_given_by' => $this->quotes_given_by,
            'quotes_given_by_profession' => $this->quotes_given_by_profession,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
