<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[ChatController::class,'index'])->name('user.login');
Route::post('/broadcast',[ChatController::class,'broadCastChat'])->name('broadCastChat.chat');
Route::get('/chat',[ChatController::class,'notfoundChat']);
Route::post('/chat',[ChatController::class,'chat'])->name('chat.message');
