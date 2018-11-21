<?php

namespace App\Http\Controllers;

use App\Todos;
use Illuminate\Http\Request;

use App\Http\Requests;

class TodosController extends Controller
{

    public function listTodos()
    {
        $todos = Todos::all();
        return view('todos', compact('todos'));
    }

    public function create(Request $request)
    {
        $todo = $request->all();
        Todos::create($todo);
        $todos = Todos::all();
        return view('todos', compact('todos'));
    }

    public function completed(Request $request)
    {
        $id = $request->get('id');
        $complete = $request->get('completed');
        $completed = $complete == 'true' ? 1 : 0;
        Todos::where('id', $id)->update(['completed' => $completed]);
        $todos = Todos::all();
        return view('todos', compact('todos'));
    }

    public function deleted(Request $request)
    {
        $id = $request->get('id');
        Todos::where('id', $id)->delete();
        $todos = Todos::all();
        return view('todos', compact('todos'));
    }
}
