<?php

namespace App\Traits\Cms;

use App\Models\PrivacyPolicy;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait PrivacyPolicyTrait
{
    public function getAllPrivacy()
    {
        return PrivacyPolicy::all();
    }

    public function showPrivacy($privacyId)
    {
        return PrivacyPolicy::findOrFail($privacyId);
    }

    public function updatePrivacy($privacyId, array $data)
    {
        try {
            $privacies = PrivacyPolicy::findOrFail($privacyId);

            $validatedData = $this->validatesliderData($data);

            $privacies->update($validatedData);

            return response()->json($privacies);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Privacy Policy not found'], 404);
        }
    }

    public function destroyPrivacy($privacyId)
    {
        try {
            $privacies = PrivacyPolicy::findOrFail($privacyId);

            $privacies->delete();

            return response()->json(['message' => 'Privacy Policy deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Privacy Policy not found'], 404);
        }
    }

}
