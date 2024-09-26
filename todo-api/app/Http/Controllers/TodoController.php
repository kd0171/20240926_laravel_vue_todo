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
    public function addTag(Request $request, Todo $todo)
    {
        // 新しいタグを作成または取得
        $tag = Tag::firstOrCreate(['name' => $request->input('name')]);

        // ToDoにタグを関連付け
        $todo->tags()->attach($tag->id);

        return response()->json($todo->tags);
    }

}
