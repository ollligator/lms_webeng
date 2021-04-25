@extends('layouts.base')

@section('content')

<h2>Available subjects</h2>

    <div class="col-sm-3 my-3">
    @foreach($subjects as $subject)
    <form action="{{ route('subject.store', ['subject'=> $subject->id]) }}" method="post">
        <!-- GET, POST, PUT, PATCH, DELETE ...  -->
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $subject['name'] }}</h5>
            </div>
            <div class="card-body">
            <p class="card-text">{{ $subject['description'] }}</p>
            <p class="card-text"><small class="text-muted">Subject code: {{ $subject['code'] }} </small></p>
            <p class="card-text"><small class="text-muted">Credits: {{ $subject['credits'] }} </small></p>
            <p class="card-text"><small class="text-muted">Teacher: {{  $subject->teacher['name'] }} </small></p>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Take subject</button>
            </div>
            </div>
        </div>
    </form>
    @endforeach
    </div>


@endsection

