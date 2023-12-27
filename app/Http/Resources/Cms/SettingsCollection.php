<?php

namespace App\Http\Resources\Cms;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SettingsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($item) {
                return [
                    'id' => $item->id,
                    'key' => $item->key,
                    'type' => $item->type,
                    'value' => ($item->type === 'image') ? url( 'storage/' . $item->value) : $item->value,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at
                ];
            }),
        ];
    }
}
