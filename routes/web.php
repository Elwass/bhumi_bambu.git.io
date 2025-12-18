<?php

use App\Http\Controllers\LandingPageController;
// use App\Http\Controllers\PromoController;


// Route::get('/', [LandingPageController::class, 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });

/*
| Public
*/

/*
| Public
*/

Route::get('/', function () {
    return view('welcome');
});


/*
/ Admin Promo CRUD
/
*/

Route::middleware(['auth'])->group(function () {

    // READ - List promo
    Route::get('/admin/promo', [PromoController::class, 'index'])->name('promo.index');

    // CREATE - Form tambah promo
    Route::get('/admin/promo/create', [PromoController::class, 'create'])->name('promo.create');
    // CREATE - Simpan promo
    Route::post('/admin/promo', [PromoController::class, 'store'])->name('promo.store');

    // EDIT - Form edit promo
    Route::get('/admin/promo/{id}/edit', [PromoController::class, 'edit'])->name('promo.edit');
    // UPDATE - Simpan perubahan promo
    Route::put('/admin/promo/{id}', [PromoController::class, 'update'])->name('promo.update');

    // DELETE - Hapus promo
    Route::delete('/admin/promo/{id}', [PromoController::class, 'destroy'])->name('promo.destroy');
});


/*
/ User Apply Promo
/
*/

Route::post('/apply-promo', [PemesananController::class, 'applyPromo'])->name('apply.promo');