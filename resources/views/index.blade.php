@extends('layout')

@section('title', 'Users')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-primary" role="button">Create user</a>

    <table class="table table-striped mt-3 table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="text-decoration-none text-reset">{{$user->name}}</a>
                </td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="text-decoration-none text-reset">{{$user->email}}</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning" role="button">Edit</a>
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
