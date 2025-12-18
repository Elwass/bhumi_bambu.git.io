<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PublicPackageController;
use App\Http\Controllers\SlotController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPackageController::class, 'landing'])->name('landing');
Route::get('/packages', [PublicPackageController::class, 'index'])->name('packages.public.index');
Route::get('/packages/{package:slug}', [PublicPackageController::class, 'show'])->name('packages.public.show');

Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/packages/{package:slug}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

    Route::get('/bookings/{booking}/payment', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/bookings/{booking}/payment', [PaymentController::class, 'store'])->name('payments.store');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

    Route::resource('packages', PackageController::class)->except(['show']);

    Route::get('packages/{package}/slots', [SlotController::class, 'index'])->name('packages.slots.index');
    Route::get('packages/{package}/slots/create', [SlotController::class, 'create'])->name('packages.slots.create');
    Route::post('packages/{package}/slots', [SlotController::class, 'store'])->name('packages.slots.store');
    Route::get('packages/{package}/slots/{slot}/edit', [SlotController::class, 'edit'])->name('packages.slots.edit');
    Route::put('packages/{package}/slots/{slot}', [SlotController::class, 'update'])->name('packages.slots.update');
    Route::delete('packages/{package}/slots/{slot}', [SlotController::class, 'destroy'])->name('packages.slots.destroy');

    Route::get('bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::post('bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');

    Route::post('payments/{payment}/verify', [PaymentController::class, 'verify'])->name('payments.verify');
});

require __DIR__ . '/auth.php';
