<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class WelcomController extends Controller
{
    public function index() {
        $formations = Formation::all();
        // Grouper par nom
    $formationsGroupees = $formations->groupBy('nom');

    // Passer les données à la vue
    return view('welcom', compact('formationsGroupees'));
    }
}
