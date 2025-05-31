<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DocumentController;

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

Route::resource('/documents', DocumentController::class);

?>