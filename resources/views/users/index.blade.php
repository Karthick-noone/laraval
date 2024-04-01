<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('content')

@if(session()->has('success'))
<div class="alert alert success bg-light text-dark">
    {{session()->get('success')}}
</div>
@endif
    <h1>Users</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Mother_tongue</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            
                <tr>
                    <td>{{ $serialNumber++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->mother_tongue }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('users.view', $user) }}" class="btn btn-primary">View</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
@endsection