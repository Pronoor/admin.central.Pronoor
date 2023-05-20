<?php

namespace App\Traits\Cms;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait TestimonialsTrait
{
    public function getAllTestimonial()
    {
        return Testimonial::all();
    }

    public function showTestimonial($testimonilaId)
    {
        return Testimonial::findOrFail($testimonilaId);
    }

    public function updateTestimonial($testimonilaId, array $data)
    {
        try {
            $testimonilas = Testimonial::findOrFail($testimonilaId);

            $validatedData = $this->validatesliderData($data);

            $testimonilas->update($validatedData);

            return response()->json($testimonilas);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Testimonials not found'], 404);
        }
    }

    public function destroyTestimonial($testimonilaId)
    {
        try {
            $testimonilas = Testimonial::findOrFail($testimonilaId);

            $testimonilas->delete();

            return response()->json(['message' => 'Testimonials deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Testimonials not found'], 404);
        }
    }

}
