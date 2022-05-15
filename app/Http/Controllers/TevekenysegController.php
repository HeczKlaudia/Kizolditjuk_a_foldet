<?php

namespace App\Http\Controllers;

use App\Models\Tevekenysegek;
use Illuminate\Http\Request;

class TevekenysegController extends Controller
{
    public function index()
    {
        $tevekenysegek = response()->json(Tevekenysegek::all());
        return $tevekenysegek;
    }
}
