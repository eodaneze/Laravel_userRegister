@extends('layout')
@section('title', 'Home page')

@section('content')
 {{-- Welcome {{auth()->user()->name}} --}}

 @auth
 Welcome {{auth()->user()->name}}
 @endauth
 
@endsection