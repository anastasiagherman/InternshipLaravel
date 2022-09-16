<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VacancyController;
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
//Route::resource('categories',[CategoryController::class]);

Route::group(['prefix' => '/categories'], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::group(['prefix' => '/companies'], function() {
    Route::get('', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/{company}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/{company}', [CompanyController::class, 'delete'])->name('company.delete');
});

Route::group(['prefix' => '/vacancies'], function() {
    Route::get('', [VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/create', [VacancyController::class, 'create'])->name('vacancy.create');
    Route::post('/create', [VacancyController::class, 'store'])->name('vacancy.store');
    Route::get('/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::post('/{vacancy}', [VacancyController::class, 'update'])->name('vacancy.update');
    Route::delete('/{vacancy}', [VacancyController::class, 'delete'])->name('vacancy.delete');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
