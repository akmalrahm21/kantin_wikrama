<!-- resources/views/admin/login.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <h1>Admin Login</h1>
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Login</button>
    </form>
@endsection
