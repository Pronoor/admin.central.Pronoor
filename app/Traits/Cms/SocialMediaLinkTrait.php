<?php

namespace App\Traits\Cms;

use App\Models\SocialMediaLink;

trait SocialMediaLinkTrait
{
    public function getAllSocialLinks()
    {
        return SocialMediaLink::all();
    }

   

}
