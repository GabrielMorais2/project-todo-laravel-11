<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
    }

    public function create(Request $request){
        $categories = Category::all();

        $data = [];

        $data['categories'] = $categories;
        return view('task.create', $data);
    }

    public function create_action(Request $request){
        $task = $request -> only(['title', 'category_id', 'description', 'due_date']);
        $task['user_id'] = 1;
        $dbTask = Task::create($task);
        return redirect(route('home'));
    }

    public function edit_action(Request $request){
        $request_data = $request ->  only(['is_done', 'title', 'due_date', 'category_id', 'description']);
        $request_data['is_done'] = $request->has('is_done') ? 1 : 0;

        $task = Task::find($request -> id);

        if (!$task) {
            return 'Erro de task não existente';
        }

        $task->update($request_data);
        $task->save();

        return redirect(route('home'));
    }

    public function edit(Request $request){
        $id = $request -> id;

        $task = Task::find($id);

        if (!$task) {
            return redirect(route('home'));
        }

        $categories = Category::all();

        $data['categories'] = $categories;
        $data['task'] = $task;

        return view('task.edit', $data);
    }

    public function delete(Request $request){

        $id = $request -> id;

        $task = Task::find($id);

        if ($task) {
            $task -> delete();
        }

        return redirect(route('home'));
    }

    public function update(Request $request){
        $task = Task::findOrFail($request -> taskId);
        $task -> is_done = $request->status;
        $task->save();
        return ['success' => true];
    }
}
