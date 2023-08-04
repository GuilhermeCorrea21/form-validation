<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\WorkspaceController;



Route::get('/', function(){ return redirect('/workspace'); });

Route::post('/create', [CardController::class, 'create'])->middleware('auth');

Route::get('/kanban/{id}', [CardController::class, 'show'])->middleware('auth');

Route::get('/details/{id}', [CardController::class, 'details'])->name('detalhes')->middleware('auth');

Route::put('/update/{id}', [CardController::class, 'update'])->middleware('auth');

Route::delete('/delete/{id}', [CardController::class, 'destroy'])->middleware('auth');

Route::get('/workspace', [WorkspaceController::class, 'show'])->middleware('auth');

Route::post('/create/workspace', [WorkspaceController::class, 'create'])->middleware('auth');

Route::post('/delete/workspace/{id}', [WorkspaceController::class, 'delete'])->middleware('auth');

Route::get('/enter', function(){
    return view('login');
})->name('login.form');

#Rotas de autênticação
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/delete/session', [LoginController::class, 'destroy']);

Route::get('/create/user', function(){ return view('register'); });

Route::post('/create/newuser', [LoginController::class, 'register']);

Route::post('/invite', [WorkspaceController::class, 'invite']);





