@extends('layout')

@section('title', isset($user) ? 'Update '.$user->name : 'Create user')

@section('content')
    <a type="button" class="btn btn-primary" href="{{ route('users.index') }}">Back to users</a>
    <form method="POST"
          @if(isset($user))
          action="{{ route('users.update', $user) }}"
          @else
          action="{{ route('users.store') }}"
        @endif
        class="mt-3">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="row mt-4">
            <div class="col">
                <input
                    value="{{ old('name', isset($user) ? $user->name : null) }}"
                    name="name" type="text" class="form-control" placeholder="Name" aria-label="Name">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input
                        value="{{ old('email', isset($user) ? $user->email : null) }}"
                        name="email" type="text" class="form-control" id="autoSizingInputGroup" placeholder="Email">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-outline-dark">Create</button>
            </div>
        </div>
    </form>
@endsection
