<?php
use Illuminate\Auth\Middleware\Authenticate; use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
return $request->user(); })->middleware(Authenticate::using('sanctum'));
//posts
Route::apiResource('/post', App\Http\Controllers\Api\productController::class);
Route::apiResource('/kritik', App\Http\Controllers\Api\kritikController::class);