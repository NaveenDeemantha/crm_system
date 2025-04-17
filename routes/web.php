<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalCustomers = \App\Models\Customer::count();
    $totalProposals = \App\Models\Proposal::count();
    return view('dashboard', [
        'totalCustomers' => $totalCustomers,
        'totalProposals' => $totalProposals
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('proposals', ProposalController::class);

require __DIR__.'/auth.php';
require __DIR__.'/customers.php';
