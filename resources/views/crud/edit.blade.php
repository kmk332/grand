@extends('master')
@section('editTask', $item->task)
@section('editId', $item->id)
@section('content')
<a href="../../index" class="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
  <center><h1>Edit ToDo Item</h1></center>
  <form action="/crud/@yield('editId')" method="post">
  {{csrf_field()}}
  {{method_field('PUT')}}
    <fieldset>
      <div class="form-group">
        <input type="text" name="task" value="@yield('editTask')" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </form>
</div>
@endsection
