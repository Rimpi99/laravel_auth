@extends('layout.base')


@section('content')

    <div class="container">
        <h1 class="mb-4">Dashboard</h1>
        <div class="card px-4 py-5" style="width: 60vmin">
            <h3>Hello <span>{{ $user->name }}</span></h3>
            <a href="/logout" class="btn btn-danger mt-4">Logout</a>
        </div>


    </div>

@endsection
