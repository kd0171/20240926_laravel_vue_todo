<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $todo = Todo::create([
            'title' => $request->input('title'),
            'completed' => false,
        ]);
        return response()->json($todo);
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());
        return response()->json($todo);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(null, 204);
    }
}
