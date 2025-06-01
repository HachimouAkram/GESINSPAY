
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LigneNotificationController;
use App\Http\Controllers\MensualiteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RappelController;
use App\Http\Controllers\RecuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomController;

// Routes pour le contrôleur AdministrateurController
Route::get('/administrateurs', [AdministrateurController::class,'index']);
Route::post('/administrateurs', [AdministrateurController::class,'store']);
Route::put('/administrateurs/{id}', [AdministrateurController::class,'update']);
Route::delete('/administrateurs/{id}', [AdministrateurController::class,'destroy']);
Route::get('/administrateurs/{id}', [AdministrateurController::class, 'show'])->where('id', '[0-9]+');
Route::get('/administrateurs/getformdetails', [AdministrateurController::class, 'getformdetails']);

// Routes pour le contrôleur DocumentController
Route::get('/documents', [DocumentController::class,'index']);
Route::post('/documents', [DocumentController::class,'store']);
Route::put('/documents/{id}', [DocumentController::class,'update']);
Route::delete('/documents/{id}', [DocumentController::class,'destroy']);
Route::get('/documents/{id}', [DocumentController::class, 'show'])->where('id', '[0-9]+');
Route::get('/documents/getformdetails', [DocumentController::class, 'getformdetails']);


// Routes pour le contrôleur EtudiantController
Route::get('/etudiants', [EtudiantController::class,'index']);
Route::post('/etudiants', [EtudiantController::class,'store']);
Route::put('/etudiants/{id}', [EtudiantController::class,'update']);
Route::delete('/etudiants/{id}', [EtudiantController::class,'destroy']);
Route::get('/etudiants/{id}', [EtudiantController::class, 'show'])->where('id', '[0-9]+');
Route::get('/etudiants/getformdetails', [EtudiantController::class, 'getformdetails']);

// Routes pour le contrôleur FormationController
Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::post('/formations', [FormationController::class,'store'])->name('formations.store');
Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
Route::put('/formations/{id}', [FormationController::class,'update'])->name('formations.update');
Route::delete('/formations/{id}', [FormationController::class,'destroy'])->name('formations.destroy');
Route::get('/formations/{id}', [FormationController::class, 'show'])->where('id', '[0-9]+')->name('formations.show');
Route::get('/formations/getformdetails', [FormationController::class, 'getformdetails'])->name('formations.formdetails');


// Routes pour le contrôleur InscriptionController
Route::get('/inscriptions', [InscriptionController::class,'index']);
Route::post('/inscriptions', [InscriptionController::class,'store']);
Route::put('/inscriptions/{id}', [InscriptionController::class,'update']);
Route::delete('/inscriptions/{id}', [InscriptionController::class,'destroy']);
Route::get('/inscriptions/{id}', [InscriptionController::class, 'show'])->where('id', '[0-9]+');
Route::get('/inscriptions/getformdetails', [InscriptionController::class, 'getformdetails']);

// Routes pour le contrôleur LigneNotificationController
Route::get('/ligne-notifications', [LigneNotificationController::class,'index']);
Route::post('/ligne-notifications', [LigneNotificationController::class,'store']);
Route::put('/ligne-notifications/{id}', [LigneNotificationController::class,'update']);
Route::delete('/ligne-notifications/{id}', [LigneNotificationController::class,'destroy']);
Route::get('/ligne-notifications/{id}', [LigneNotificationController::class, 'show'])->where('id', '[0-9]+');
Route::get('/ligne-notifications/getformdetails', [LigneNotificationController::class, 'getformdetails']);

// Routes pour le contrôleur MensualiteController
Route::get('/mensualites', [MensualiteController::class,'index']);
Route::post('/mensualites', [MensualiteController::class,'store']);
Route::put('/mensualites/{id}', [MensualiteController::class,'update']);
Route::delete('/mensualites/{id}', [MensualiteController::class,'destroy']);
Route::get('/mensualites/{id}', [MensualiteController::class, 'show'])->where('id', '[0-9]+');
Route::get('/mensualites/getformdetails', [MensualiteController::class, 'getformdetails']);

// Routes pour le contrôleur NotificationController
Route::get('/notifications', [NotificationController::class,'index']);
Route::post('/notifications', [NotificationController::class,'store']);
Route::put('/notifications/{id}', [NotificationController::class,'update']);
Route::delete('/notifications/{id}', [NotificationController::class,'destroy']);
Route::get('/notifications/{id}', [NotificationController::class, 'show'])->where('id', '[0-9]+');
Route::get('/notifications/getformdetails', [NotificationController::class, 'getformdetails']);

// Routes pour le contrôleur PayementController
Route::get('/payements', [PayementController::class,'index']);
Route::post('/payements', [PayementController::class,'store']);
Route::put('/payements/{id}', [PayementController::class,'update']);
Route::delete('/payements/{id}', [PayementController::class,'destroy']);
Route::get('/payements/{id}', [PayementController::class, 'show'])->where('id', '[0-9]+');
Route::get('/payements/getformdetails', [PayementController::class, 'getformdetails']);

// Routes pour le contrôleur ProfileController
Route::get('/profiles', [ProfileController::class,'index']);
Route::post('/profiles', [ProfileController::class,'store']);
Route::put('/profiles/{id}', [ProfileController::class,'update']);
Route::delete('/profiles/{id}', [ProfileController::class,'destroy']);
Route::get('/profiles/{id}', [ProfileController::class, 'show'])->where('id', '[0-9]+');
Route::get('/profiles/getformdetails', [ProfileController::class, 'getformdetails']);

// Routes pour le contrôleur RappelController
Route::get('/rappels', [RappelController::class,'index']);
Route::post('/rappels', [RappelController::class,'store']);
Route::put('/rappels/{id}', [RappelController::class,'update']);
Route::delete('/rappels/{id}', [RappelController::class,'destroy']);
Route::get('/rappels/{id}', [RappelController::class, 'show'])->where('id', '[0-9]+');
Route::get('/rappels/getformdetails', [RappelController::class, 'getformdetails']);

// Routes pour le contrôleur RecuController
Route::get('/recus', [RecuController::class,'index']);
Route::post('/recus', [RecuController::class,'store']);
Route::put('/recus/{id}', [RecuController::class,'update']);
Route::delete('/recus/{id}', [RecuController::class,'destroy']);
Route::get('/recus/{id}', [RecuController::class, 'show'])->where('id', '[0-9]+');
Route::get('/recus/getformdetails', [RecuController::class, 'getformdetails']);

// Routes pour le contrôleur UserController
Route::get('/users', [UserController::class,'index']);
Route::post('/users', [UserController::class,'store']);
Route::put('/users/{id}', [UserController::class,'update']);
Route::delete('/users/{id}', [UserController::class,'destroy']);
Route::get('/users/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
Route::get('/users/getformdetails', [UserController::class, 'getformdetails']);

// Routes pour le contrôleur WelcomController
Route::get('/welcoms', [WelcomController::class,'index']);
Route::post('/welcoms', [WelcomController::class,'store']);
Route::put('/welcoms/{id}', [WelcomController::class,'update']);
Route::delete('/welcoms/{id}', [WelcomController::class,'destroy']);
Route::get('/welcoms/{id}', [WelcomController::class, 'show'])->where('id', '[0-9]+');
Route::get('/welcoms/getformdetails', [WelcomController::class, 'getformdetails']);

