<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success bg-light text-dark">
    {{ session()->get('success') }}
</div>
@endif
<a class="text-primary" href="{{route('users.index')}}">Back to list</a>
                                                                                                                           
<h1>Create User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control {{$errors->has('name')?'is-invalid' :''}}" id="name" name="name" required value="{{old('name')}}">
        @if($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="text" class="form-control {{$errors->has('phone_number')?'is-invalid' :''}}" id="phone_number" name="phone_number" required value="{{old('phone_number')}}">
        @if($errors->has('phone_number'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('phone_number')}}</strong>
                        </span>
                        @endif
    </div>
    <div class="mb-3">
        <label for="email" class="form-label ">Email</label>
        <input type="email" class="form-control {{$errors->has('email')?'is-invalid' :''}}" id="email" name="email" required value="{{old('email')}}">
        @if($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control {{$errors->has('password')?'is-invalid' :''}}" id="password" name="password" required value="{{old('password')}}">
        @if($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('password')}}</strong>
                        </span>
                        @endif
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-control {{$errors->has('gender')?'is-invalid' :''}}" id="gender" name="gender" required value="{{old('gender')}}">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @if($errors->has('gender'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('gender')}}</strong>
                        </span>
                        @endif
    </div>
    <div class="mb-3">
        <label for="mother_tongue" class="form-label">Mother Tongue</label>
        <input type="text" class="form-control {{$errors->has('mother_tongue')?'is-invalid' :''}}" id="mother_tongue" name="mother_tongue" required value="{{old('mother_tongue')}}"> 
        @if($errors->has('mother_tongue'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('mother_tongue')}}</strong>
                        </span>
                        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection