<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create_todo(Request $request)
    {
        $newTodoData = json_decode($request->getContent());

        $newTodo = new Todo();
        $newTodo->task = $newTodoData->task;

        $newTodo->save();
        return $newTodo;
    }

    public function list()
    {
        $allTodo = Todo::all();
        return $allTodo;
    }

    public function detail_todo($id)
    {
        return Todo::where('id', $id)->first();
    }

    public function tick($id)
    {
        $todo = Todo::where("id", $id)
            ->where("id", $id)
            ->where("tick", false)
            ->first();
        if ($todo == null) {
            return response()
                ->json("todo_not_found", 404);
        }
        $todo->tick = true;
        $todo->ticked_at = Carbon::now();
        $todo->save();
        return "ok";
    }
}
