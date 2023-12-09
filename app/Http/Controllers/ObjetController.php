<?php

namespace App\Http\Controllers;

use App\Models\Demenagement;
use App\Models\Objet;
use Illuminate\Http\Request;

class ObjetController extends Controller
{
    public function index()
    {
       return response()->json(Objet::all());
    }
}
