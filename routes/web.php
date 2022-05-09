<?php


use App\Http\Controllers\CandidaturesController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashRecruteur', function () {
    return view('dashRecruteur');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashCandidat', function () {
    return view('dashCandidat');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::resource('candidat',UserController::class);
//Route::any('candidat',UserController::class);

//Route::post('/candidat/{candidat}/edit', [UserController::class, 'update'])->name('candidat.test');

Route::any('offres/{id}/candidater', [OffreController::class, 'candidater'])->name('candidater');

Route::resource('user',UserController::class);

Route::resource('candidatures',CandidaturesController::class)->middleware(['auth']);

Route::resource('offres',OffreController::class);

$user = \Illuminate\Support\Facades\Auth::user();
if (!isset($user)){
    Route::any('offres/{id}/candidater', [OffreController::class, 'candidater'])->name('candidater')->middleware(['auth']);
}else {
    Route::any('offres/{id}/candidater', [OffreController::class, 'candidater'])->name('candidater');
    }


Route::any('offres/{id}/dossier',[OffreController::class, 'dossiercandidature'])->name('offres.dossier')->middleware(['auth']);
