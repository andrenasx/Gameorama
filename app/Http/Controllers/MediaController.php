<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function retrieve(string $path) {
        $array = explode('+', $path);
        return Storage::get('public/' . implode('/', $array));
    }
}
