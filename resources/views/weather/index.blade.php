@extends('master')
@section('content')
<div class="col-lg-6 col-lg-offset-3">
  <center><h1>Get Weather</h1></center>
  <form action="/weather" method="post">
  {{csrf_field()}}
   <div class="form-group">
     <label for="zip">Enter zipcode:</label>
     <input type="text" class="form-control" name="zip" placeholder="E.g. 10036">
   </div>
   <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @foreach ($weather as $w)
    {{$w->finalWeather}}
  @endforeach
</div>
@endsection
