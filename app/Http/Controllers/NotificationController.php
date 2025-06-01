<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\LigneNotification;
use App\Models\User; // ou Utilisateur
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Afficher les notifications pour un utilisateur connecté

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $notifications = LigneNotification::with('notification')
                            ->where('utilisateur_id', $user->id)
                            ->orderByDesc('date')
                            ->get();

        return view('notifications.index', compact('notifications'));
    }
    public function toutesLesNotifications()
    {
        $notifications = Notification::with('lignes.utilisateur')->get();
        return view('notifications.index', compact('notifications'));
    }
    // ✅ Affiche le formulaire d'envoi de notifications
    public function form()
    {
        return view('notifications.envoyer');
    }

    // ✅ Traite l'envoi de la notification
    public function envoyer(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'type_message' => 'required',
            'utilisateur_ids' => 'required|array',
        ]);

        $notification = Notification::create([
            'message' => $request->message,
            'type_message' => $request->type_message,
            'date_envois' => now(),
            'lu' => false,
        ]);

        foreach ($request->utilisateur_ids as $userId) {
            LigneNotification::create([
                'notification_id' => $notification->id,
                'date' => now(),
                'utilisateur_id' => $userId,
            ]);
        }

        return redirect()->route('notifications.form')->with('success', 'Notification envoyée avec succès.');
    }

    // Marquer une notification comme lue
    public function marquerCommeLue($id)
    {
        $ligne = LigneNotification::findOrFail($id);
        $ligne->update(['lu' => true]);

        return redirect()->back()->with('success', 'Notification marquée comme lue.');
    }


    public function indexEtudiant()
    {
        $user = Auth::user(); // ou auth()->user()

        $lignes = LigneNotification::with('notification')
            ->where('utilisateur_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        return view('etudiant.notifications.index', compact('lignes'));
    }

    // Créer une nouvelle notification pour plusieurs utilisateurs
    /*public function envoyer(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'type_message' => 'required|string',
            'utilisateur_ids' => 'required|array'
        ]);

        $notification = Notification::create([
            'message' => $request->message,
            'type_message' => $request->type_message,
            'date_envois' => now()
        ]);

        foreach ($request->utilisateur_ids as $id) {
            LigneNotification::create([
                'notification_id' => $notification->id,
                'utilisateur_id' => $id,
                'lu' => false,
                'date' => now()
            ]);
        }

        return redirect()->back()->with('success', 'Notification envoyée.');
    }*/
}
