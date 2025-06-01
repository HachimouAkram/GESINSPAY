<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//page accuil utilisateur
require __DIR__.'/auth.php';
Route::get('/', [WelcomController::class, 'index'])->name('welcom');

//page d accuile etudiant
Route::middleware(['auth'])->group(function () {
    Route::get('/etudiant', function () {
        if (!Gate::allows('access-etudiant')) {
            abort(403, 'Accès interdit');
        }
        return view('etudiant.dashboard');
    })->name('etudiant.dashboard');
    //Notification D un etudiant
    Route::get('/etudiant/notifications', [NotificationController::class, 'indexEtudiant'])->name('etudiant.notifications');
    Route::patch('/notifications/{id}/lue', [NotificationController::class, 'marquerCommeLue'])->name('notifications.lue');
    // cree incription (etudiant)
    Route::resource('documents', DocumentController::class);
    Route::get('/inscriptions/create', [InscriptionController::class, 'create'])->name('inscriptions.create');
    Route::post('/api/inscriptions', [InscriptionController::class, 'store']);
    // ajout des document (etudiant).
    Route::get('/ajouter-document', function () {
        return view('documents.create');
    });
});

//Dashboard admin
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        if (!Gate::allows('access-admin')) {
            abort(403, 'Accès interdit');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
//Gerer les utilisateur creer archiver et modifier
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
});
//le controlle des inscription par l administrateur
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/inscriptions', [InscriptionController::class, 'indexParStatut'])->name('admin.inscriptions');
    Route::put('/admin/inscriptions/{id}/statut', [InscriptionController::class, 'updateStatut'])->name('inscriptions.updateStatut');
    Route::get('/inscriptions/{id}/valider', [InscriptionController::class, 'valider'])->name('inscriptions.valider');
    Route::get('/inscriptions/{id}/refuser', [InscriptionController::class, 'refuser'])->name('inscriptions.refuser');
    Route::get('admin/inscriptions/statut', [InscriptionController::class, 'inscriptionsParStatut'])->name('admin.inscriptions_par_statut');
});
//gerer formation par adimin
Route::middleware(['auth'])->group(function () {
    Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
    Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
    Route::get('/formations', [FormationController::class,'index']);
    Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
    Route::delete('/formations/{id}', [FormationController::class, 'destroy'])->name('formations.destroy');
    Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formations.update');
    Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
});
//Gerer les notification Admin envoyer et verifier l etat
Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'toutesLesNotifications'])->name('notifications.index');
    Route::post('/notifications/envoyer', [NotificationController::class, 'envoyer'])->name('notifications.envoyer');
    Route::get('/notifications/envoyer', [NotificationController::class, 'form'])->name('notifications.form');
});
Route::get('/admin/users', [AdminUserController::class, 'index'])
    ->middleware('auth')
    ->name('admin.users.index');
