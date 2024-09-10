<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rota para a página de boas-vindas
Route::get('/', function () {
    return view('welcome');
});

// Rotas para a gestão de tarefas
use App\Http\Middleware\CustomCsrfToken;

Route::middleware([CustomCsrfToken::class])->group(function () {
    Route::post('tasks', [TaskController::class, 'store']);
    Route::get('tasks/{task}', [TaskController::class, 'show']);
});

