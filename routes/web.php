<?php

use App\Http\Controllers\Naissance\FormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------\\\\\\\\\\\----------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
    // return view('welcome');
});

Auth::routes();

Route::middleware( 'auth')->group( function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/naissance/registre', [App\Http\Controllers\Add\AddController::class, 'index'])->name('naissance.registre');
    Route::get('/naissance/registre/{id}/edit', [App\Http\Controllers\Add\AddController::class, 'edit'])->name('naissance.registre.edit');
    Route::post('/naissance/registre/{id}/edit', [App\Http\Controllers\Add\AddController::class, 'update'])->name('naissance.registre.edit.post');
    Route::get('/naissance/registre/create', [App\Http\Controllers\Add\AddController::class, 'create'])->name('naissance.registre.create');
    Route::post('/naissance/registre/create', [App\Http\Controllers\Add\AddController::class, 'store'])->name('naissance.registre.create.post');
    Route::get('/naissance/registre/{id}/detail', [App\Http\Controllers\Add\AddController::class, 'show'])->name('naissance.registre.show');
    Route::get('/naissance/registre/{id}/delete', [App\Http\Controllers\Add\AddController::class, 'destroy'])->name('naissance.registre.delete');

    Route::get('/marriage/registre', [App\Http\Controllers\Marriage\MarriageController::class, 'index'])->name('marriage.registre');
    Route::get('/marriage/registre/{id}/edit', [App\Http\Controllers\Marriage\MarriageController::class, 'edit'])->name('marriage.registre.edit');
    Route::post('/marriage/registre/{id}/edit', [App\Http\Controllers\Marriage\MarriageController::class, 'update'])->name('marriage.registre.edit.post');
    Route::get('/marriage/registre/create', [App\Http\Controllers\Marriage\MarriageController::class, 'create'])->name('marriage.registre.create');
    Route::post('/marriage/registre/create', [App\Http\Controllers\Marriage\MarriageController::class, 'store'])->name('marriage.registre.create.post');
    Route::get('/marriage/registre/{id}/detail', [App\Http\Controllers\Marriage\MarriageController::class, 'show'])->name('marriage.registre.show');
    Route::get('/marriage/registre/{id}/delete', [App\Http\Controllers\Marriage\MarriageController::class, 'destroy'])->name('marriage.registre.delete');

    Route::get( '/naissance/registre/geographical_zone', [FormController::class, 'geographical_zone'])->name( 'naissance.forms.geographical_zone');
    Route::get( '/naissance/registre/child_info', [FormController::class, 'child_info'])->name( 'naissance.forms.child_info');
    Route::get( '/naissance/registre/father_info', [FormController::class, 'father_info'])->name( 'naissance.forms.father_info');
    Route::get( '/naissance/registre/mother_info', [FormController::class, 'mother_info'])->name( 'naissance.forms.mother_info');
    Route::get( '/naissance/registre/declarant_info', [FormController::class, 'declarant_info'])->name( 'naissance.forms.declarant_info');
    Route::get( '/naissance/registre/judgement', [FormController::class, 'judgement'])->name( 'naissance.forms.judgement');

    Route::get('/registre/{id}/edit', [App\Http\Controllers\Add\AddController::class, 'edit'])->name('registre.edit');
    Route::post('/registre/{id}/edit', [App\Http\Controllers\Add\AddController::class, 'update'])->name('registre.edit.post');


    Route::get('/centre', [App\Http\Controllers\Centre\CentreController::class, 'index'])->name('centre');
    Route::get('/centre/create', [App\Http\Controllers\Centre\CentreController::class, 'create'])->name('centre.create');
    Route::post('/centre/create', [App\Http\Controllers\Centre\CentreController::class, 'store'])->name('centre.create.post');
    Route::get('/centre/{id}/detail', [App\Http\Controllers\Centre\CentreController::class, 'show'])->name('centre.show');

    Route::get('/centre/{id}/edit', [App\Http\Controllers\Centre\CentreController::class, 'edit'])->name('centre.edit');
    Route::post('/centre{id}/edit', [App\Http\Controllers\Centre\CentreController::class, 'update'])->name('centre.edit.post');

    Route::get('/centre/{id}/delete', [App\Http\Controllers\Centre\CentreController::class, 'destroy'])->name('centre.delete');

    Route::get('/communes', [App\Http\Controllers\Communes\CommunesController::class, 'index'])->name('communes');
    Route::get('/communes/create', [App\Http\Controllers\Communes\CommunesController::class, 'create'])->name('communes.create');
    Route::post('/communes/create', [App\Http\Controllers\Communes\CommunesController::class, 'store'])->name('communes.create.post');
    Route::get('/communes/{id}/detail', [App\Http\Controllers\Communes\CommunesController::class, 'show'])->name('communes.show');

    Route::get('/communes/{id}/edit', [App\Http\Controllers\Communes\CommunesController::class, 'edit'])->name('communes.edit');
    Route::post('/communes/{id}/edit', [App\Http\Controllers\Communes\CommunesController::class, 'update'])->name('communes.edit.post');

    Route::get('/communes/{id}/delete', [App\Http\Controllers\Communes\CommunesController::class, 'destroy'])->name('communes.delete');


    Route::get('/arrondissement', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'index'])->name('arrondissement');
    Route::get('/arrondissement/create', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'create'])->name('arrondissement.create');
    Route::post('/arrondissement/create', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'store'])->name('arrondissement.create.post');
    Route::get('/arrondissement/{id}/detail', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'show'])->name('arrondissement.show');

    Route::get('/arrondissement/{id}/edit', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'edit'])->name('arrondissement.edit');
    Route::post('/arrondissement/{id}/edit', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'update'])->name('arrondissement.edit.post');
    Route::get('/arrondissement/{id}/delete', [App\Http\Controllers\Arrondissement\ArrondissementController::class, 'destroy'])->name('arrondissement.delete');


    Route::get('/department', [App\Http\Controllers\Department\DepartmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [App\Http\Controllers\Department\DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department/create', [App\Http\Controllers\Department\DepartmentController::class, 'store'])->name('department.create.post');
    Route::get('/department/{id}/detail', [App\Http\Controllers\Department\DepartmentController::class, 'show'])->name('department.show');

    Route::get('/department/{id}/edit', [App\Http\Controllers\Department\DepartmentController::class, 'edit'])->name('department.edit');
    Route::post('/department/{id}/edit', [App\Http\Controllers\Department\DepartmentController::class, 'update'])->name('department.edit.post');

    Route::get('/department/{id}/delete', [App\Http\Controllers\Department\DepartmentController::class, 'destroy'])->name('department.delete');


//User Routes
    Route::get('/edit-user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit.user');
    Route::get('/view-user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('view.user');
    Route::post('/edit-user/{id}/', [App\Http\Controllers\HomeController::class, 'update_user'])->name('edit.user.post');

//Route::match(['get', 'post'], '/edit-user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit.user');
    Route::get('/delete-user/{id}', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete.user');
    Route::get('/create-user', [App\Http\Controllers\HomeController::class, 'create'])->name('create.user');
    Route::post('/create-user', [App\Http\Controllers\HomeController::class, 'save'])->name('create.user.post');
// Route::match(['get', 'post'], '/edit-user/{id}', [App\Http\Controllers\HomeController::class, 'edit_user'])->name('edit.user');

//    Route::match(['get', 'post'], '/create-user', [App\Http\Controllers\HomeController::class, 'create_user'])->name('create.user');
//     Route::get('/delete-user/{id}', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete.user');



//Settings
    Route::match(['get', 'post'], '/my-profile', [App\Http\Controllers\HomeController::class, 'my_profile'])->name('my.profile');
    Route::match(['get', 'post'], '/change-password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change.password');
    Route::match(['post'], '/delete-notification', [App\Http\Controllers\HomeController::class, 'delete_notification'])->name('delete.notification');
    Route::match(['get'], '/delete-all-notification', [App\Http\Controllers\HomeController::class, 'delete_all_notification'])->name('delete.all.notification');

    Route::get('/pays', [App\Http\Controllers\Pays\PaysController::class, 'index'])->name('pays.index');
    Route::get('/pays/create', [App\Http\Controllers\Pays\PaysController::class, 'create'])->name('pays.create');
    Route::post('/pays/create', [App\Http\Controllers\Pays\PaysController::class, 'store'])->name('pays.create.post');

    Route::get('/pays/{id}/details/{rt}', [App\Http\Controllers\Pays\PaysController::class, 'show'])->name('pays.show');

    Route::get('/pays/{id}/edit', [App\Http\Controllers\Pays\PaysController::class, 'edit'])->name('pays.edit');
    Route::post('/pays/{id}/edit', [App\Http\Controllers\Pays\PaysController::class, 'update'])->name('pays.edit.post');

    Route::get('/pays/{id}/delete', [App\Http\Controllers\Pays\PaysController::class, 'destroy'])->name('pays.delete');


    Route::get('/regions', [App\Http\Controllers\Regions\RegionsController::class, 'index'])->name('regions.index');
    Route::get('/regions/create', [App\Http\Controllers\Regions\RegionsController::class, 'create'])->name('region.create');
    Route::post('/regions/create', [App\Http\Controllers\Regions\RegionsController::class, 'store'])->name('region.create.post');
    Route::get('/regions/{id}/details/{rt}', [App\Http\Controllers\Regions\RegionsController::class, 'show'])->name('region.show');

    Route::get('/regions/{id}/edit/', [App\Http\Controllers\Regions\RegionsController::class, 'edit'])->name('region.edit');
    Route::post('/regions/{id}/edit/', [App\Http\Controllers\Regions\RegionsController::class, 'update'])->name('region.edit.post');

    Route::get('/regions/{id}/delete', [App\Http\Controllers\Regions\RegionsController::class, 'destroy'])->name('region.delete');

    //Deces Routes Here
    Route::get('deces/registre/create', [App\Http\Controllers\Deces\DecesController::class, 'create'])->name('deces.registre.create');
    Route::get('deces/registre', [App\Http\Controllers\Deces\DecesController::class, 'index'])->name('deces.registre');
    Route::post('deces/registre/create', [App\Http\Controllers\Deces\DecesController::class, 'store'])->name('deces.registre.create.post');
    Route::get('/deces/registre/{id}/edit', [App\Http\Controllers\Deces\DecesController::class, 'edit'])->name('deces.registre.edit');
    Route::post('/deces/registre/{id}/edit', [App\Http\Controllers\Deces\DecesController::class, 'update'])->name('deces.registre.edit.post');
    Route::get('/deces/registre/{id}/detail', [App\Http\Controllers\Deces\DecesController::class, 'show'])->name('deces.registre.show');
    Route::get('/deces/registre/{id}/delete', [App\Http\Controllers\Deces\DecesController::class, 'destroy'])->name('deces.registre.delete');

    //Certificat De C??libat
    Route::get('/celibat', [App\Http\Controllers\Celibat\CelibatController::class, 'index'])->name('celibat.index');
    Route::get('/celibat/create', [App\Http\Controllers\Celibat\CelibatController::class, 'create'])->name('celibat.create');
    Route::post('/celibat/create', [App\Http\Controllers\Celibat\CelibatController::class, 'store'])->name('celibat.create.post');
    Route::get('/celibat/registre/{id}/edit', [App\Http\Controllers\Celibat\CelibatController::class, 'edit'])->name('celibat.edit');
    Route::post('/celibat/registre/{id}/edit', [App\Http\Controllers\Celibat\CelibatController::class, 'update'])
        ->name('celibat.edit.post');
    Route::get('/celibat/{id}/detail', [App\Http\Controllers\Celibat\CelibatController::class, 'show'])->name('celibat.show');
    Route::get('/celibat/{id}/delete', [App\Http\Controllers\Celibat\CelibatController::class, 'destroy'])->name('celibat.delete');

    //Vie Collectif
    Route::get('/collectif', [App\Http\Controllers\Collectif\CollectifController::class, 'index'])->name('collectif.index');
    Route::get('/collectif/create', [App\Http\Controllers\Collectif\CollectifController::class, 'create'])->name('collectif.create');
    Route::post('/collectif/create', [App\Http\Controllers\Collectif\CollectifController::class, 'store'])->name('collectif.create.post');
    Route::get('/collectif/registre/{id}/edit', [App\Http\Controllers\Collectif\CollectifController::class, 'edit'])->name('collectif.edit');
    Route::post('/collectif/registre/{id}/edit', [App\Http\Controllers\Collectif\CollectifController::class, 'update'])
        ->name('collectif.edit.post');
    Route::get('/collectif/{id}/detail', [App\Http\Controllers\Collectif\CollectifController::class, 'show'])->name('collectif.show');
    Route::get('/collectif/{id}/delete', [App\Http\Controllers\Collectif\CollectifController::class, 'destroy'])->name('collectif.delete');

    //Vie Individuel
    Route::get('/individuel', [App\Http\Controllers\Individuel\IndividuelController::class, 'index'])->name('individuel.index');
    Route::get('/individuel/create', [App\Http\Controllers\Individuel\IndividuelController::class, 'create'])->name('individuel.create');
    Route::post('/individuel/create', [App\Http\Controllers\Individuel\IndividuelController::class, 'store'])->name('individuel.create.post');
    Route::get('/individuel/registre/{id}/edit', [App\Http\Controllers\Individuel\IndividuelController::class, 'edit'])->name('individuel.edit');
    Route::post('/individuel/registre/{id}/edit', [App\Http\Controllers\Individuel\IndividuelController::class, 'update'])
        ->name('individuel.edit.post');
    Route::get('/individuel/{id}/detail', [App\Http\Controllers\Individuel\IndividuelController::class, 'show'])->name('individuel.show');
    Route::get('/individuel/{id}/delete', [App\Http\Controllers\Individuel\IndividuelController::class, 'destroy'])->name('individuel.delete');

    //Residence
    Route::get('/residence', [App\Http\Controllers\ResidenceController::class, 'index'])->name('residence.index');
    Route::get('/residence/create', [App\Http\Controllers\ResidenceController::class, 'create'])->name('residence.create');
    Route::post('/residence/create', [App\Http\Controllers\ResidenceController::class, 'store'])->name('residence.create.post');
    Route::get('/residence/registre/{id}/edit', [App\Http\Controllers\ResidenceController::class, 'edit'])->name('residence.edit');
    Route::post('/residence/registre/{id}/edit', [App\Http\Controllers\ResidenceController::class, 'update'])
        ->name('residence.edit.post');
    Route::get('/residence/{id}/detail', [App\Http\Controllers\ResidenceController::class, 'show'])->name('residence.show');
    Route::get('/residence/{id}/delete', [App\Http\Controllers\ResidenceController::class, 'destroy'])->name('residence.delete');

});
