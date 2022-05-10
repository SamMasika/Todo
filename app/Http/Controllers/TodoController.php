<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Alert;

class TodoController extends Controller
{
   
    public function index()
    {
        $todos=Todo::all();
        return view('home',compact('todos'));
    }

    
    public function store(Request $request)
    {
        $data=$request->validate([
            'content'=>'required'
        ],[
            'content.required'=>'"Task required"'
        ]);

        Todo::create($data);
        toast('You\'ve Successfully stored','success');

        return back();
    }

   
    public function destroy(Todo $todo)
    {
        $todo->delete();
        toast('You\'ve Successfully deleted','success');
        return back();
    }
}
