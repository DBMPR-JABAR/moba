<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Villages;
use Illuminate\Http\Request;

class VillagesController extends Controller
{
    public function index()
    {
        $kemendagri_kode_kecamatan = 320311; // CUGENANG
        return response()->json([
            'status' => 'success',
            'data' => Villages::where('kemendagri_kode_kecamatan', $kemendagri_kode_kecamatan)->get()
        ]);
    }
}
