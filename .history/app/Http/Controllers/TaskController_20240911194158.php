<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Lista todas as tarefas
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // Cria uma nova tarefa
    public function store(Request $request)
    {
        // Valida a entrada
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'required|boolean',
        ]);

        // Cria a tarefa
        $task = Task::create($validatedData);

        // Retorna a resposta com a tarefa criada e o status 201
        return response()->json($task, 201);
    }

    // Atualiza uma tarefa existente
    public function update(Request $request, Task $task)
    {
        // Valida a entrada
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'completed' => 'sometimes|required|boolean',
        ]);

        // Atualiza a tarefa
        $task->update($validatedData);

        // Retorna a resposta com a tarefa atualizada
        return response()->json($task);
    }

    // Deleta uma tarefa
    public function destroy(Task $task)
    {
        // Deleta a tarefa
        $task->delete();

        // Retorna uma resposta com status 204 (No Content)
        return response()->json(null, 204);
    }
}