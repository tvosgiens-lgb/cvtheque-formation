<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CvthequeController,
    CompetenceController,
    MetierController,
    ProfessionnelController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('cvtheque');
//});

Route::get('/', [CvthequeController::class, 'index'])->name('accueil');

/**
 * Route pour la recherche d'une compétence
 */
Route::get('/competences/search',[CompetenceController::class,'index'])
    ->name('competence.search');

Route::resource('competences', CompetenceController::class);

/**
 * Route pour la suppression d'un métier de manière indirecte(via formulaire)
 */
Route::get('/metiers/{metier}/delete', [MetierController::class, 'delete'])
    ->name('metiers.delete');

Route::resource('metiers', MetierController::class);

/**
 * Route pour l'affichage des professionnels pour une compétence
 */
Route::get('competence/professionnels', [ProfessionnelController::class, 'search'])
    ->name('professionnels.competence');

/**
 * Route pour l'affichage des professionnels pour 1 métier
 */
Route::get('/metier/{slug}/professionnels',[ProfessionnelController::class, 'index'])
    ->name('professionnels.metier');

/**
 * Route pour la recherche d'un professionnel
 */
Route::get('professionnels/search', [ProfessionnelController::class, 'index'] )
    ->name('professionnel.search');

Route::resource('professionnels', ProfessionnelController::class);
