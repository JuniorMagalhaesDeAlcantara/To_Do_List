<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rota para a página de boas-vindas
Route::get('/', function () {
    return view('welcome');
});

// Rotas para a gestão de tarefas
// routes/web.php
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/{task}', [TaskController::class, 'show']);
