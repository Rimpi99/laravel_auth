@extends('layout.base')


@section('content')

    <div class="container">
        <h1 class="mb-4">Dashboard</h1>
        <div class="card px-4 py-5" style="width: 60vmin">
            <h3>Hello <span>{{ $user->name }}</span></h3>
            <a href="/logout" class="btn btn-danger mt-4">Logout</a>
        </div>
        <div class="row">
            <div class="col">
                @foreach ($tasks as $t)
                    <div class="card px-2 py-2">
                        <span>{{ $t->id }}</span>
                        <h5>
                            {{ $t->task }}
                        </h5>
                        <input type="text" hidden value="{{ $t->id }}">
                        <button class="btn btn-primary"
                            onclick="updateTask('{{ $t->id }}','{{ csrf_token() }}','{{ $t->status == 'pending' ? 'done' : 'pending' }}')">change
                            to
                            {{ $t->status == 'pending' ? 'done' : 'pending' }}</button>

                    </div>

                @endforeach
            </div>
            <div class="col">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="task..." id="floatingTextarea2" style="height: 100px"
                        name="task"></textarea>
                    <label for="floatingTextarea2">Add Task</label>
                </div>
                <button class="btn btn-primary" onclick="addTask('{{ $user->id }}','{{ csrf_token() }}')">Add
                    Task</button>
            </div>
        </div>

    </div>

@endsection
