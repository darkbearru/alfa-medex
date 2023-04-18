<?php

use App\Helpers\VersionHelper;
use App\Http\Controllers\CatalogController;
use App\Models\Catalog;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return Inertia::render('Catalog', [
            'versions' => VersionHelper::List(),
            'catalog' => CatalogController::Directories()
        ]);
    })->name('dashboard');

    /*
    Route::get('/catalog', function () {
        return Inertia::render('Catalog', [
            'versions' => VersionHelper::List(),
            'catalog' => CatalogController::Directories()
        ]);
    });
    */

    Route::get('/catalog/directories/{id}', function ($id) {
        return CatalogController::Directories($id);
    });

    Route::get('/catalog/test', function () {
        ddd(Catalog::Directories());
    });
});


require __DIR__ . '/auth.php';
