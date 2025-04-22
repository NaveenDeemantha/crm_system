<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StripeController;

use Illuminate\Container\Attributes\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalCustomers = \App\Models\Customer::count();
    $totalProposals = \App\Models\Proposal::count();
    $totalInvoices = \App\Models\Invoice::count();
    return view('dashboard', [
        'totalCustomers' => $totalCustomers,
        'totalProposals' => $totalProposals,
        'totalInvoices' => $totalInvoices
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('proposals', ProposalController::class);
Route::resource('invoices', InvoiceController::class);
Route::post('invoices/{invoice}/send', [InvoiceController::class, 'send'])->name('invoices.send');
Route::get('invoices/{invoice}/payment', [InvoiceController::class, 'payment'])->name('invoices.payment');

// Stripe Payment Routes
Route::get('checkout/{invoice}', [StripeController::class, 'checkout'])->name('checkout');
Route::get('payment/success/{invoice}', [StripeController::class, 'success'])->name('payment.success');

//Auth::routes(['verify' => true])
require __DIR__.'/auth.php';
require __DIR__.'/customers.php';
