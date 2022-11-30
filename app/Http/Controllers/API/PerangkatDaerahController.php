<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDaerah;
use Illuminate\Http\Request;

class PerangkatDaerahController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => PerangkatDaerah::all()
        ]);
    }
}
