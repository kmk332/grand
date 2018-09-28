@extends('master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="crud/create" class="btn btn-info">Add ToDo</a>
<div class="col-lg-6 col-lg-offset-3">
  <center><h1>ToDo List</h1></center>
  <ul class="list-group col-lg-8 col-lg-offset-2">
    @foreach ($todos as $todo)
      <li class="list-group-item">
        {{$todo->task}}
        <a href="{{'/crud/'.$todo->id.'/complete'}}"><i class="fa fa-square-o pull-left" style="line-height: inherit;"></i></a>
        <form class="form-group pull-right" action="{{'/crud/'.$todo->id}}" method="post">{{csrf_field()}}{{method_field('DELETE')}}<button type="submit" style="border:none;"><i class="fa fa-trash-o pull-right"></i></button>
        </form>
        <a href="{{'/crud/'.$todo->id.'/edit'}}"><i class="fa fa-edit pull-right" style="line-height: inherit;"></i></a>
      </li>
    @endforeach
  </ul>
  <center><h1>Completed Tasks</h1></center>
  <ul class="list-group col-lg-8 col-lg-offset-2">
    @foreach ($complete_todos as $complete_todo)
      <li class="list-group-item">
        {{$complete_todo->task}}
        <a href="{{'/crud/'.$complete_todo->id.'/incomplete'}}"><i class="fa fa-check-square-o pull-left" style="line-height: inherit;"></i></a>
        <form class="form-group pull-right" action="{{'/crud/'.$complete_todo->id}}" method="post">{{csrf_field()}}{{method_field('DELETE')}}<button type="submit" style="border:none;"><i class="fa fa-trash-o pull-right"></i></button>
        </form>
      </li>
    @endforeach
  </ul>

</div>
@endsection
