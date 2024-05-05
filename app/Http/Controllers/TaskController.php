<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
    }

    public function create(Request $request){
        return view('task.create');
    }

    public function edit(Request $request){
        return view('task.edit');
    }

    public function delete(Request $request){
        //deleta e volta pra home
        return redirect(route('home'));
    }
}
