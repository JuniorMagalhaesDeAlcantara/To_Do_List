<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * @OA\Info(title="To-Do List API", version="1.0.0")
 */
class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tasks",
     *     summary="Lista todas as tarefas",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de todas as tarefas"
     *     )
     * )
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Cria uma nova tarefa",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "completed"},
     *             @OA\Property(property="title", type="string", example="New task title"),
     *             @OA\Property(property="description", type="string", example="Task description"),
     *             @OA\Property(property="completed", type="boolean", example=false)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarefa criada com sucesso"
     *     )
     * )
     */
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

    /**
     * @OA\Put(
     *     path="/api/tasks/{id}",
     *     summary="Atualiza uma tarefa existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Updated task title"),
     *             @OA\Property(property="description", type="string", example="Updated task description"),
     *             @OA\Property(property="completed", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarefa atualizada com sucesso"
     *     )
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/api/tasks/{id}",
     *     summary="Deleta uma tarefa",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Tarefa deletada com sucesso"
     *     )
     * )
     */
    public function destroy(Task $task)
    {
        // Deleta a tarefa
        $task->delete();

        // Retorna uma resposta com status 204 (No Content)
        return response()->json(null, 204);
    }
}
