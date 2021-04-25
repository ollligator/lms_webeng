@extends('layouts.base')

@section('content')
<div class="container py-3">
    <h2>{{ $solution->task->name }}</h2>
    <p>{{ $solution->task->description }}</p>
</div>

<ol class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
        <span class="badge badge-primary badge-pill">Points: {{ $solution->points }}/{{ $solution->task->points }} </span>
        <div class="fw-bold">Student: {{ $solution['student_name'] }}</div>
        <div class="fw-bold">Solution: {{ $solution['solution'] }}</div>
            <form action="{{ route('solutions.update', [ 'solution' => $solution->id ]) }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('points') is-invalid @enderror" name="points" id="points" placeholder="" value="{{ old('points', '') }}">
                @error('points')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-primary">Evaluate</button>
                </div>
            </form>
        </div>
    </li>
  </ol>



@endsection
