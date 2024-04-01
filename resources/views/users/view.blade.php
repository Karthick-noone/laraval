<!-- resources/views/users/edit.blade.php -->

@extends('layouts.app')

@section('content')

@if(session()->has('success'))
<div class="alert alert success bg-light text-dark">
    {{session()->get('success')}}
</div>
@endif

<a class="text-primary" href="{{route('users.index')}}">Back to list</a>

    <h1>View User</h1>

    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control bg-light" id="name" name="name" value="{{ $user->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control bg-light" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control bg-light" id="email" name="email" value="{{ $user->email }}" readonly>
        </div>
        <!-- <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div> -->
        <div class="mb-3" >
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control bg-light" id="gender" name="gender" disabled>
                <option  value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                <option readonly value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="mother_tongue" class="form-label">Mother Tongue</label>
            <input type="text" class="form-control bg-light" id="mother_tongue" name="mother_tongue" value="{{ $user->mother_tongue }}" readonly>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Update</button> -->
    </form>
@endsection
