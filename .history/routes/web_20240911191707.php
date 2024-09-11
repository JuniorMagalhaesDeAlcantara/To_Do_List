<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rota para a página de boas-vindas
Route::get('/', function () {
    return view('welcome');
});

// Rotas para a gestão de tarefas
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

// Rota para a documentação do Swagger
Route::get('/api/documentation', function () {
    return view('swagger-l5::index');
});

