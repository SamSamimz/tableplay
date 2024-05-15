<?php

use App\Livewire\Games\DashingLudo;
use App\Livewire\Home;
use App\Livewire\Verification;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','verified'])->group(function() {
    Route::get('/', Home::class)->name('home');
    Route::get('/dashing-ludo',DashingLudo::class)->name('dashing-ludo');
});


Route::get('/verification', Verification::class)->name('verification.notice')->middleware('not-verified');

require __DIR__.'/_auth.php';