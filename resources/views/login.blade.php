@extends('layout.base')

@section('content')
    <div class="container py-5">
        <div class="card px-4 py-4 mx-auto border border-primary" style="width: 40vw">
            @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif

            <h1 class="mb-4">Login</h1>
            <form action="{{ route('loginPage') }}" method="POST">
                @csrf
                <input type="email" class="form-control mb-4" name="email" placeholder="name@example.com">
                <input type="password" class="form-control mb-4" name="password" placeholder="******">
                <button class="btn btn-primary">Submit</button>

                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <a class="btn mt-4" href="/register">not a user? <span
                    style="font-weight: bold; color: blue;font-size: 1.2rem">Sign-up</span></a>
        </div>

    </div>
@endsection
