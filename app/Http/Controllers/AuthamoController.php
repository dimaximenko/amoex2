<?php

namespace App\Http\Controllers;

use App\Models\Amoapi;
use Illuminate\Http\Request;

class AuthamoController extends Controller
{
    public function makeAuthAccess()
    {

        $amoApi = new Amoapi();
        $amoApi->getAccessToken();

//        return view('service');
    }
}
