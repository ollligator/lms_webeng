@extends('layouts.base')

@section('content')
    <div class="container py-3">
      <h2>New task</h2>
      <form action="{{ route('subjects.tasks.store', [ 'subject' => $subject_id ]) }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="name">Task name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="" value="{{ old('name', '') }}">

          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description', '') }}</textarea>
            @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
              <label for="points">Points</label>
              <input name="points" type="text" class="form-control @error('points') is-invalid @enderror" id="points" placeholder=""
              value="{{ old('points', '') }}">

              @error('points')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Add new task</button>
        </div>

      </form>
    </div>
    @endsection
