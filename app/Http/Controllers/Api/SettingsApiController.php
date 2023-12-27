<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cms\SettingsCollection;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $settings = Settings::all();
            $aboutUsCollection = new SettingsCollection($settings);
            return response()->json(
                $aboutUsCollection, 200
            );
        } catch (\Exception $exception) {
            return response()->json(
                [
                    'message' => 'Something went wrong!',
                    'error' => $exception->getMessage()
                ], 403
            );
        }
    }
}
