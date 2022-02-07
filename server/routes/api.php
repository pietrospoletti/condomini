<?php

use App\Http\Controllers\BuildingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/buildings",[BuildingController::class, 'buildings']);

Route::get("/buildings/{id}",[BuildingController::class, 'building']);

Route::post("/addbuilding",[BuildingController::class, 'addbuilding']);

Route::put("/edit/{id}",[BuildingController::class, 'edit']);

Route::delete('/delete/{id}', [BuildingController::class,"delete"]);