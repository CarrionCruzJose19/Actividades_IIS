<?php

use App\Http\Controllers\NoticeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('/notices', NoticeController::class);