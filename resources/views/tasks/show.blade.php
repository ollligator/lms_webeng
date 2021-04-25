@extends('layouts.base')

@section('content')
<div class="container py-3">
    <h2>{{ $task->name }}</h2>
    <p>{{ $task->description }}</p>
    <p class="card-text"><small class="text-muted">Max points: {{ $task['points'] }} </small></p>
    @if (Auth::user()->is_teacher)
    <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="btn btn-secondary">Edit</a>
    <form action="{{ route('tasks.destroy', [ 'task' => $task->id ]) }}" method="POST" class="d-inline">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-warning">Delete</button>
    </form>
    @endif
</div>



@foreach ($task->solutions as $solution)
@if(Auth::user()->name==$solution->student_name)
    <h3>My solution:</h3>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $solution['solution'] }}</div>
            <hr class="my-4">
            <a href="#myModal" class="btn btn-primary" data-toggle="modal">
                Re-submit solution
            </a>

            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Solution</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('solutions.update', [ 'solution' => $solution->id ]) }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <textarea name="solution" class="form-control @error('solution') is-invalid @enderror" id="solution" rows="3">{{ old('solution', $solution['solution']) }}</textarea>
                                    @error('solution')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Resubmit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            </div>
        </li>

      </ol>
@elseif(Auth::user()->is_teacher)
<ol class="list-group list-group-numbered">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
        <span class="badge badge-primary badge-pill">Points: {{ $solution->points }}/{{ $solution->task->points }} </span>
        <div class="fw-bold">Student:{{ $solution['student_name'] }}</div>
        <div class="fw">{{ $solution['student_email'] }}</div>
        <div class="fw">{{ $solution['created_at'] }}</div>
        <hr class="my-1">
        <div class="fw-bold">{{ $solution['solution'] }}</div>
        <hr class="my-1">
        <a href="{{ route('solutions.show', [ 'solution' => $solution->id ]) }}" class="btn btn-secondary">Evaluate</a>


        </div>
    </li>
  </ol>
@endif
@endforeach


<hr class="my-4">
@if(!Auth::user()->is_teacher)
    <h3>Add Solution</h3>
    <form action="{{ route('tasks.solutions.store', [ 'task' => $task->id ]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="solution">Solution</label>
            <textarea name="solution" class="form-control @error('solution') is-invalid @enderror" id="solution" rows="3">{{ old('solution', '') }}</textarea>
            @error('solution')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endif

@endsection

