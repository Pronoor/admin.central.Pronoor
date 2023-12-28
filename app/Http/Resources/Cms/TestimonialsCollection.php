<?php

namespace App\Http\Resources\Cms;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TestimonialsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $this->collection;
        return [
            'data' => $this->collection->map(function ($item) {
                return [
                    'id' => $item->id,
                    'quote' => $item->quote,
                    'quotes_given_by' => $item->quotes_given_by,
                    'quotes_given_by_profession' => $item->quotes_given_by_profession,
                    'image' => (isset($item->image) && $item->image !== '') ? url( 'storage/' . $item->image) : '',
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at
                ];
            }),
        ];
    }
}
