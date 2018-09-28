<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;

class CRUDController extends Controller
{
  public function index()
  {
    $todos = crud::where('completed', false)->orderBy("id", "DEC")->get();
    $complete_todos = crud::where('completed', true)->get();
    return view('crud.index', compact('todos', 'complete_todos'));
  }

  public function create()
  {
    return view('crud.create');
  }

  public function store(Request $request)
  {
    $todo = new crud;
    $todo->task = $request->task;
    $todo->completed = false;
    $todo->save();
    return redirect('crud');
  }

  public function edit($id)
  {
    $item = crud::find($id);
    return view('crud.edit',compact('item'));
  }

  public function update(Request $request, $id)
  {
    $todo = crud::find($id);
    $todo->task = $request->task;
    $todo->save();
    return redirect('crud');
  }

  public function complete($id)
  {
    $todo = crud::find($id);
    $todo->completed = true;
    $todo->save();
    return redirect('crud');
  }

  public function incomplete($id)
  {
    $todo = crud::find($id);
    $todo->completed = false;
    $todo->save();
    return redirect('crud');
  }

  public function destroy($id)
  {
    $item = crud::find($id);
    $item->delete();
    return redirect('crud');
  }
}
