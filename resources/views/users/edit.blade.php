<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')

@if(session()->has('success'))
<div class="alert alert success bg-light text-dark">
    {{session()->get('success')}}
</div>
@endif

<a class="text-primary" href="{{route('users.index')}}">Back to list</a>

    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control  {{$errors->has('name')?'is-invalid' :''}}" id="name" name="name" value="{{ $user->name }}" required>
            @if($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control {{$errors->has('phone_number')?'is-invalid' :''}}" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
            @if($errors->has('phone_number'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('phone_number')}}</strong>
                        </span>
                        @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control {{$errors->has('email')?'is-invalid' :''}}" id="email" name="email" value="{{ $user->email }}" required>
            @if($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control {{$errors->has('password')?'is-invalid' :''}}" id="password" value="{{ $user->password }}" name="password">
            @if($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('password')}}</strong>
                        </span>
                        @endif
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="mother_tongue" class="form-label">Mother Tongue</label>
            <input type="text" class="form-control {{$errors->has('mother_tongue')?'is-invalid' :''}}" id="mother_tongue" name="mother_tongue" value="{{ $user->mother_tongue }}" required>
            @if($errors->has('mother_tongue'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('mother_tongue')}}</strong>
                        </span>
                        @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
