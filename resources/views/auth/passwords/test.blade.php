@extends('layouts.app')

@section('content')
  <h1>Congratiolations you change your password.</h1>
    <h3>Please check your mail.</h3>

  <a href="{{ URL::route('home.show') }}">Back to home page.</a>






@endsection
