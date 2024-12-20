<?php

use App\Http\Controllers\ShortenerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->group(function () {
    Route::post("short-urls", [ShortenerController::class, "shorten"]);
});
