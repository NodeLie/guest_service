<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

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

