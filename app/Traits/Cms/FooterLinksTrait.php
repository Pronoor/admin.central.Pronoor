<?php

namespace App\Traits\Cms;

use App\Models\FooterLink;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait FooterLinksTrait
{
    public function getAllFooterLinks()
    {
        return FooterLink::all();
    }

    public function showFotterLink($footerLinkId)
    {
        return FooterLink::findOrFail($footerLinkId);
    }

    public function updateFotterLinks($sliderId, array $data)
    {
        try {
            $footerLink = FooterLink::findOrFail($sliderId);

            $validatedData = $this->validatesliderData($data);

            $footerLink->update($validatedData);

            return response()->json($footerLink);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Slider not found'], 404);
        }
    }

    public function destroySlider($footerLinkId)
    {
        try {
            $slider = FooterLink::findOrFail($footerLinkId);

            $slider->delete();

            return response()->json(['message' => 'FooterLinks deleted']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'FooterLinks not found'], 404);
        }
    }

}
