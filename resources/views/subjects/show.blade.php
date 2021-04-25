@extends('layouts.base')

@section('content')

    <div class="container py-3">
      <h2>{{ $subject->name }}</h2>
      <p>{{ $subject->description }}</p>
      <p>Teacher: {{ $subject->teacher['name'] }}</p>
      <p>{{ $subject->teacher['email'] }}</p>
      <p class="card-text"><small class="text-muted"> {{ $subject['code'] }} </small></p>
      <p class="card-text"><small class="text-muted">Credits: {{ $subject['credits'] }} </small></p>

      @if (Auth::user()->is_teacher)
      <a href="{{ route('subjects.edit', [ 'subject' => $subject->id ]) }}" class="btn btn-secondary">Edit</a>
      <form action="{{ route('subjects.destroy', [ 'subject' => $subject->id ]) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Delete</button>
        <hr class="my-4">
      </form>
      @else
      <form action="{{ route('subject.destroy', [ 'subject' => $subject->id ]) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Leave Subject</button>
        <hr class="my-4">
      </form>
      @endif

      @if(Auth::user()->is_teacher)
      <div class="col-sm-3 my-3">
          <div class="card h-100">
            <a href="{{ route('subjects.tasks.create', [ 'subject' => $subject->id ]) }}" class="btn btn-secondary h-100 pt-20">Add new task &raquo;</a>
          </div>
        </div>
      @endif

      <h3>Tasks</h3>

      <ul class="list-group">
        <hr class="my-4">
          @foreach ($subject->tasks as $task)

            <li class="list-group-item list-group-item-action" style="background-color: #fffff">
                <p class="d-flex justify-content-between align-items-center">
                    <span>
                        <a href="{{route('tasks.show',['task'=>$task->id])}}">
                        {{ $task->name }}

                        </a>
                    </span>
                    <span class="badge badge-primary badge-pill">Max points: {{ $task->points }} </span>
                    @if(!Auth::user()->is_teacher)
                    @foreach ($task->solutions as $solution)
                        @if(($solution->is_evaluated) && (Auth::user()->name==$solution->student_name))
                        <span class="badge badge-primary badge-pill">My Points: {{ $solution->points }} </span>
                        @elseif((!$solution->is_evaluated) && (Auth::user()->name==$solution->student_name))
                        <span class="badge badge-secondary badge-pill">Not evaluated </span>
                        @endif
                    @endforeach
                    @endif

                </p>
                @if(Auth::user()->is_teacher)
                <a href="{{ route('tasks.edit', [ 'task' => $task->id ]) }}" class="btn btn-secondary">Edit</a>
                <form action="{{ route('tasks.destroy', [ 'task' => $task->id ]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning">Delete</button>
                  </form>
                @endif

            </li>
          @endforeach
      </ul>

      <hr class="my-4">
      <h3>Assigned students: {{$subject->students->count()}}</h3>
      <ol class="list-group list-group-numbered">
        @foreach ($students = $subject->students as $student)
        <li class="list-group-item d-flex justify-content-between align-items-start">
          <div class="ms-2 me-auto">
            <div class="fw-bold">{{ $student['name'] }}</div>
            <span class="badge bg-secondary rounded-pill">{{ $student['email'] }}</span>

          </div>
        </li>
        @endforeach

      </ol>




@endsection
