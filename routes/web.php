<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;


Route::get('/', [ContactsController::class, 'index']);
Route::get('/index', [ContactsController::class, 'index']);
Route::post('/confirm', [ContactsController::class, 'confirm']);
Route::get('/thanks', [ContactsController::class, 'thanks']);
Route::post('/add', [ContactsController::class, 'create']);
Route::get('/admin', [ContactsController::class, 'find']);
Route::post('/search', [ContactsController::class, 'search']);
Route::post('/delete', [ContactsController::class, 'remove']);
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
