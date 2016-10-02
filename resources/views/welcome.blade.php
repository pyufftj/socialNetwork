@extends('layouts.master')

@section('title')
    social network
@endsection

@section('content')
   @include('partials.errors')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{route('user.signup')}}" method="post">
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">Your E-Mail</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{$errors->has('first_name')?'has-error':''}}">
                    <label for="fist_name">Your First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
                </div>
                <div class="form-group {{$errors->has('password')?'has-error':''}}">
                    <label for="password">Your Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                {{csrf_field()}}
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign in</h3>
            <form action="{{route('user.signin')}}" method="post">
                <div class="form-group {{$errors->has('email')?'has-error':''}}">
                    <label for="email">Your E-Mail</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{Request::old('email')}}">
                </div>

                <div class="form-group {{$errors->has('password')?'has-error':''}}">
                    <label for="password">Your Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-success">Sumbit</button>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection