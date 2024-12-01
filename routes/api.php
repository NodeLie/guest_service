<?php

use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use libphonenumber\PhoneNumberUtil;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//маршруты api сервис работы с гостями
// Route::get('/guests', function () {
//     return 'Hello World';
// });
// Route::get('phone', function () {
//     $phoneUtil = PhoneNumberUtil::getInstance();
//     $phoneNumber = $phoneUtil->parse("+772722345678");
//     $country = $phoneUtil->getRegionCodeForNumber($phoneNumber);
//     return $country;
// });
Route::apiResource('guests', GuestController::class);
// Route::get('guests', [GuestController::class, 'index']);
// Route::get('guests/{id}', [GuestController::class, 'show']);
// Route::post('guests', [GuestController::class, 'store']);
// Route::put('guests/{id}', [GuestController::class, 'update']);
// Route::delete('guests/{id}', [GuestController::class, 'destroy']);
