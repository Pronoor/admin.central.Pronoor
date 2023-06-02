<?php

namespace App\Traits;

use App\Models\Address;

trait AddressTrait
{
    public function getAlladdress()
    {
        return Address::all();
    }



}
