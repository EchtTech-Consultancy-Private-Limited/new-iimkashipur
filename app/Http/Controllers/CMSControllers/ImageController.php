<?php

namespace App\Http\Controllers\CMSControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ImageController extends Controller
{
    public function encryptPath($path)
    {
        return Crypt::encryptString($path);
    }

}
