<?php

namespace App\Traits\Cms;

use App\Models\ContactUs;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ContactUsTrait
{
    public function getAllContact()
    {
        return ContactUs::all();
    }

    public function showContact($contactId)
    {
        return ContactUs::findOrFail($contactId);
    }

    public function updateContact($contactId, array $data)
    {
        try {
            $conatacts = ContactUs::findOrFail($contactId);

            $validatedData = $this->validatesliderData($data);

            $conatacts->update($validatedData);

            return response()->json($conatacts);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Conatacts not found'], 404);
        }
    }
  

    public function destroyContact($contactId)
    {
        try {
            $conatacts = ContactUs::findOrFail($contactId);

            $conatacts->delete();

            return response()->json(['message' => 'Conatacts deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Conatacts not found'], 404);
        }
    }

}
