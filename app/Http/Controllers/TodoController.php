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
        Alert::success('Congrats', 'You\'ve Successfully stored');

        return back();
    }

   
    public function destroy(Todo $todo)
    {
        $todo->delete();
        Alert::success('Congrats', 'You\'ve Successfully deleted');
        return back();
    }
}
