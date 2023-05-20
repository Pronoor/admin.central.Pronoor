<?php

namespace App\Traits\Cms;

use App\Models\TermsCondition;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait TermsConditionTrait
{
    public function getAllTerms()
    {
        return TermsCondition::all();
    }

    public function showTerms($termsId)
    {
        return TermsCondition::findOrFail($termsId);
    }

    public function updateTerms($termsId, array $data)
    {
        try {
            $terms = TermsCondition::findOrFail($termsId);

            $validatedData = $this->validatesliderData($data);

            $terms->update($validatedData);

            return response()->json($terms);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Terms not found'], 404);
        }
    }

    public function destroyFaq($termsId)
    {
        try {
            $terms = TermsCondition::findOrFail($termsId);

            $terms->delete();

            return response()->json(['message' => 'Terms deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Terms not found'], 404);
        }
    }

}
