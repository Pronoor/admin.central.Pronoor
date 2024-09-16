<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index() {   
        return view('admin.cms.settings.index',
            [
                'settings' => Settings::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $setting = Settings::find($id);

            if ($setting->type == 'text') {
                $request->validate([
                    'value' => 'required',
                ]);
                $setting->value = $request->value;
            }

            if ($setting->type == 'image') {
                $request->validate([
                    'value' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $logoPath = $request->file('value')->store('uploads/header_logos', 'public');
                $setting->value = $logoPath;
            }
            
            $setting->save();
            return redirect()->action([SettingsController::class, 'index'])->with('status', $setting->description . ' update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([SettingsController::class, 'index'])->with('status', $setting->description . ' - Something Went Wrong!');;
        }
    }
}
