@extends('layout')
@section('title', 'Login page')
@section('content')

    <div class="container mt-5">
      <div class="mt-5">
        {{-- laravel will generate the error message --}}
         @if($errors->any())
            <div class="col-6 ms-auto me-auto">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger text-center">
                      {{$error}}
                    </div>
                @endforeach
            </div>
         @endif

         {{-- user generated error --}}
         @if(session()->has('error'))  
            <div class="alert alert-danger text-center">
              {{session('error')}}
            </div> 
         @endif
         @if(session()->has('success'))  
            <div class="alert alert-success text-center">
              {{session('success')}}
            </div> 
         @endif
      </div>
        <form action="{{route('login.post')}}" method="POST" autocomplete="off" class="ms-auto me-auto  border p-3 bg-white" style="width: 500px">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input name="email" type="email" class="form-control">
              
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input name="password" type="password" class="form-control">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>Don't have an account? <a href="/register">Register</a></p>
          </form>
    </div>
@endsection