<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\SupplierController;

Route::apiResource('category',CategoryController::class);
Route::apiResource('brand',BrandController::class);
Route::apiResource('supplier',SupplierController::class);
