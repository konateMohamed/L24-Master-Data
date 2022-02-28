<?php

use Illuminate\Support\Facades\Route;

Route::resource('/items', App\Http\Controllers\ItemController::class);

Route::redirect('/', '/items');
