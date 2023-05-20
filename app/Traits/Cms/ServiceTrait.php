<?php

namespace App\Traits\Cms;

use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ServiceTrait
{
    public function getAllService()
    {
        return Service::all();
    }

    public function showService($serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function updateService($serviceId, array $data)
    {
        try {
            $service = Service::findOrFail($serviceId);

            $validatedData = $this->validatesliderData($data);

            $service->update($validatedData);

            return response()->json($service);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    }

    public function destroyService($serviceId)
    {
        try {
            $service = Service::findOrFail($serviceId);

            $service->delete();

            return response()->json(['message' => 'Service deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    }

}
