<?php

namespace App\Traits;

use App\Models\AboutUs;
use App\Models\Subscribe;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait SubscribeTrait
{
    public function getAllSubscribe()
    {
        return Subscribe::all();
    }

    public function showSubscribe($subscribeId)
    {
        return Subscribe::findOrFail($subscribeId);
    }

    public function updateAbouts($subscribeId, array $data)
    {
        try {
            $subscribe = Subscribe::findOrFail($subscribeId);

            $validatedData = $this->validatesliderData($data);

            $subscribe->update($validatedData);

            return response()->json($subscribe);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Abouts not found'], 404);
        }
    }

    public function destroyAbouts($subscribeId)
    {
        try {
            $subscribe = Subscribe::findOrFail($subscribeId);

            $subscribe->delete();

            return response()->json(['message' => 'Abouts deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Abouts not found'], 404);
        }
    }

}
