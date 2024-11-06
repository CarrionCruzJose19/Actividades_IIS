<?php

use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;


Route::get('/publicaciones', [NoticeController::class, 'showPublicaciones']);
