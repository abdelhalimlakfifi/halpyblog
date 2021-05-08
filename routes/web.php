<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscirptionController;
use App\Http\Controllers\followSystem;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Auth::routes();


Route::get('/create', [PostController::class, 'Create']);
Route::Post('/create', [PostController::class, 'store']);
Route::get('/articles', [PostController::class, 'Articles']);
Route::get('/articles/{id}',[PostController::class, 'read']);
Route::post('/subscription',[SubscirptionController::class, 'index']);
Route::post('/follow', [followSystem::class, 'index']);
Route::post('/unfollow',[followSystem::class, 'unfollow']);