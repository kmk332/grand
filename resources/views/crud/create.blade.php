@extends('master')
@section('content')
<a href="../index" class="btn btn-info">Back</a>
<div class="col-lg-4 col-lg-offset-4">
  <center><h1>Create New ToDo Item</h1></center>
  <form action="/crud" method="post">
  {{csrf_field()}}
    <fieldset>
      <div class="form-group">
        <input type="text" name="task" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
  </form>
</div>
@endsection
