<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\apicontroller;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RepController;


Route::apiResource('agency', AgencyController::class);

Route::apiResource('reports', ReportController::class);


Route::apiResource('reports.attachments', AttachmentController::class);


Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);




Route::post('updates', [UpdateController::class, 'store']);
Route::get('reports/{reportId}/updates', [UpdateController::class, 'index']);
Route::post('updates/{updateId}/comments', [CommentController::class, 'store']);

Route::apiResource('reps', RepController::class);
