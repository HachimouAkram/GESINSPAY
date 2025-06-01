<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'type_profil' => 'required|in:admin,etudiant',
        ]);

        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'type_profil' => $request->type_profil,
            'email' => strtolower($request->name . '.' . $request->lastname . '@example.com'), // à adapter si besoin
            'password' => Hash::make('passer123'),
        ]);

        return redirect()->route('admin.users.create')->with('success', 'Utilisateur créé avec succès !');
    }

}
