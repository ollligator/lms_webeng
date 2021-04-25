@extends('layouts.base')

@section('content')
<div class="row">

    @foreach($subjects as $subject)
      <div class="col-sm-3 my-3">
        <div class="card h-100">
          <img src="{{ 'https://image.freepik.com/free-vector/online-education-illustration-book-notes-smartphone-education-icon-concept-white-isolated_138676-637.jpg' }}" class="card-img-top">
          <div class="card-body">
            <h5  class="card-title">  {{ $subject['name'] }}</h5>

            <p class="card-text"><small class="text-muted"> {{ $subject['code'] }} </small></p>
            <p class="card-text">{{ $subject['description'] }}</p>
            <p class="card-text"><small class="text-muted">Credits: {{ $subject['credits'] }} </small></p>
            <p class="card-text"><small class="text-muted">Teacher: {{ $subject->teacher['name'] }} </small></p>
            <a href="{{route('subjects.show', [ 'subject' => $subject->id ]) }}" class="btn btn-primary">Details &raquo;</a>
            @if(!Auth::user()->is_teacher)

            <form action="{{ route('subject.destroy', [ 'subject' => $subject->id ]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Leave Subject</button>
                <hr class="my-4">
              </form>
             @endif
        </div>
        </div>
      </div>
    @endforeach



    @if(Auth::user()->is_teacher)
    <div class="col-sm-3 my-3">
        <div class="card h-100">
          <a href="{{route('subjects.create')}}" class="btn btn-primary h-100 pt-5">Create a new subject &raquo;</a>
        </div>
      </div>
    @endif

  </div>
@endsection

