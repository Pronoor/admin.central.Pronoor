<?php

namespace App\Traits\Cms;

use App\Models\Faq;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait FaqsTrait
{
    public function getAllFaq()
    {
        return Faq::all();
    }

    public function showfaq($faqId)
    {
        return Faq::findOrFail($faqId);
    }

    public function updateFaq($faqId, array $data)
    {
        try {
            $faqs = Faq::findOrFail($faqId);

            $validatedData = $this->validatesliderData($data);

            $faqs->update($validatedData);

            return response()->json($faqs);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Faqs not found'], 404);
        }
    }

    public function destroyFaq($faqId)
    {
        try {
            $faqs = Faq::findOrFail($faqId);

            $faqs->delete();

            return response()->json(['message' => 'Faqs deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Faqs not found'], 404);
        }
    }

}
