<?php

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

//Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('/', function() {
//    return view('layouts.website');
//});

Route::middleware('auth')->group(function () {
    Route::resource('/project', App\Http\Controllers\ProjectController::class);
    Route::resource('/preliminary-work', App\Http\Controllers\PreliminaryWorkController::class);
    Route::resource('/site-evaluation', App\Http\Controllers\SiteEvaluationController::class);
    Route::resource('/worker', App\Http\Controllers\WorkerController::class);
    Route::resource('/mobilization', App\Http\Controllers\MobilizationController::class);
    Route::resource('/site-clearance', App\Http\Controllers\SiteClearanceController::class);
    Route::resource('/documentation', App\Http\Controllers\DocumentationController::class);
    Route::resource('/contractor', App\Http\Controllers\ContractorController::class);
    Route::resource('/design-drawing', App\Http\Controllers\DesignDrawingController::class);
    Route::resource('/architectural-drawing', App\Http\Controllers\ArchitecturalDrawingController::class);
    Route::resource('/structural-design', App\Http\Controllers\StructuralDesignController::class);
    Route::resource('/interior-detail', App\Http\Controllers\InteriorDetailController::class);
    Route::resource('/m-e-p', App\Http\Controllers\MEPController::class);
    Route::resource('/procurement', App\Http\Controllers\ProcurementController::class);
    Route::resource('/requisition', App\Http\Controllers\RequisitionController::class);
    Route::resource('/country', App\Http\Controllers\CountryController::class);
    Route::resource('/requisition-category', App\Http\Controllers\RequisitionCategoryController::class);
    Route::resource('/unit', App\Http\Controllers\UnitController::class);
    Route::resource('/purchase-order', App\Http\Controllers\PurchaseOrderController::class);

    Route::get('/invoice/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'invoice'] );
});

//Admin route


//end Admin route
