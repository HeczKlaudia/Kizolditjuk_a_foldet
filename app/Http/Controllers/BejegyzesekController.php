<?php

namespace App\Http\Controllers;

use App\Models\Bejegyzesek;
use Illuminate\Http\Request;

class BejegyzesekController extends Controller
{
    public function index()
    {
        $bejegyzesek = response()->json(Bejegyzesek::with('tevekenyseg')->get());
        return $bejegyzesek;
    }

    public function osztaly($id)
    {
        $bejegyzesek = Bejegyzesek::with('tevekenyseg')->where('osztaly_id', $id)->get();
        return $bejegyzesek;
    }

    public function store(Request $request)
    {
        $bejegyzes = new Bejegyzesek();
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->allapot = 0;
        $bejegyzes->save();

        return Bejegyzesek::find($bejegyzes->id);
    }
}
