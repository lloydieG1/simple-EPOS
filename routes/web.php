<?php

use App\Http\Middleware\IsAdmin;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\AgreementItemController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Agreement routes
    Route::get('/agreement', [AgreementController::class, 'index'])->name('agreement.index');
    Route::get('/agreement/create', [AgreementController::class, 'create'])->name('agreement.create');
    Route::post('/agreement', [AgreementController::class, 'store'])->name('agreement.store');
    Route::delete('/agreement/{agreement}', [AgreementController::class, 'destroy'])->name('agreement.destroy');
    Route::get('/agreement/{agreement}', [AgreementController::class, 'show'])->name('agreement.show');
    Route::get('/agreement/{agreement}/edit', [AgreementController::class, 'edit'])->name('agreement.edit');

    // AgreementItem routes
    Route::get('/agreement/{agreement}/item', [AgreementItemController::class, 'index'])->name('agreement-item.index');
    Route::get('/agreement/{agreement}/item/create', [AgreementItemController::class, 'create'])->name('agreement-item.create');
    Route::post('/agreement/{agreement}/item', [AgreementItemController::class, 'store'])->name('agreement-item.store');
    Route::delete('/agreement/{agreement}/item/{item}', [AgreementItemController::class, 'destroy'])->name('agreement-items.destroy');
});

// route group for admin only
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
});

require __DIR__.'/auth.php';
