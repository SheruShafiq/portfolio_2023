<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SignAgreementController;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/investments', [InvestmentsController::class, 'index'])->name('profile.investments');
    Route::get('/profile/projects', [ProfileController::class, 'projects'])->name('profile.projects');

    Route::get('/projects/{project}/investments/create', [InvestmentsController::class, 'create'])->name('investments.create');
    Route::post('/projects/{project}/investments', [InvestmentsController::class, 'store'])->name('investments.store');

    Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/projects/create', [ProjectsController::class, 'store'])->middleware(HandlePrecognitiveRequests::class)->name('projects.store');
    Route::get('/profile/projects/{project}/edit', [ProjectsController::class, 'edit'])->name('profile.projects.edit');
    Route::patch('/profile/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::patch('/profile/projects/{project}/status', [ProjectsController::class, 'updateStatus'])->name('projects.update.status');

    Route::get('/projects/investments/agreement/{investment}', [SignAgreementController::class, 'show'])->name('investments.agreement.show');
    Route::post('/projects/investments/agreement/{investment}', [SignAgreementController::class, 'store'])->name('investments.agreement.store');
});

Route::get('/', HomeController::class)->name('home');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');

require __DIR__.'/auth.php';
