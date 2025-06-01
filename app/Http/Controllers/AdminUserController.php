<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{


   public function index()
{
    $admins = User::where('type_profil', 'admin')->get();

    $etudiantsInscrits = User::where('type_profil', 'etudiant')
        ->whereHas('inscriptions')
        ->get();

    $etudiantsNonInscrits = User::where('type_profil', 'etudiant')
        ->whereDoesntHave('inscriptions')
        ->get();

    return view('admin.users.index', compact(
        'admins',
        'etudiantsInscrits',
        'etudiantsNonInscrits'
    ));
}

}

