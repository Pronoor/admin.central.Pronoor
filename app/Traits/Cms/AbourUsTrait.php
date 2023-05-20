<?php

namespace App\Traits\Cms;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait AbourUsTrait
{
    public function getAllAbouts()
    {
        return AboutUs::all();
    }

    public function showAbouts($aboutId)
    {
        return AboutUs::findOrFail($aboutId);
    }

    public function updateAbouts($aboutId, array $data)
    {
        try {
            $abouts = AboutUs::findOrFail($aboutId);

            $validatedData = $this->validatesliderData($data);

            $abouts->update($validatedData);

            return response()->json($abouts);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Abouts not found'], 404);
        }
    }

    public function destroyAbouts($aboutsId)
    {
        try {
            $abouts = AboutUs::findOrFail($aboutsId);

            $abouts->delete();

            return response()->json(['message' => 'Abouts deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Abouts not found'], 404);
        }
    }

}
