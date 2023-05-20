<?php

namespace App\Traits\Cms;

use App\Models\HomeSlider;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait SliderTrait
{
    public function getAllSliders()
    {
        return HomeSlider::all();
    }

    public function showSlider($sliderId)
    {
        return HomeSlider::findOrFail($sliderId);
    }

    public function updateSlider($sliderId, array $data)
    {
        try {
            $slider = HomeSlider::findOrFail($sliderId);

            $validatedData = $this->validatesliderData($data);

            $slider->update($validatedData);

            return response()->json($slider);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Slider not found'], 404);
        }
    }

    public function destroySlider($sliderId)
    {
        try {
            $slider = HomeSlider::findOrFail($sliderId);

            $slider->delete();

            return response()->json(['message' => 'Slider deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Slider not found'], 404);
        }
    }

}
