@extends('layouts.base')

@section('content')

<h2>New subject</h2>
  <form action="{{ route('subjects.store') }}" method="post">
    <!-- GET, POST, PUT, PATCH, DELETE ...  -->

    @csrf

    <div class="form-group">
      <label for="name">Subject name</label>
      <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder=""
      value="{{ old('name', '') }}">

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
        <label for="code">Subject code</label>
        <input name="code" type="text" class="form-control @error('code') is-invalid @enderror" id="code" placeholder=""
        value="{{ old('code', 'IK-') }}">

        @error('code')
        <div class="invalid-feedback">
          {{ 'Subject Code should be in a format IK-SSSNNN, where S is a capital from the English alphabet, and N is number.' }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="credits">Credits</label>
        <input name="credits" type="text" class="form-control @error('credits') is-invalid @enderror" id="credits" placeholder=""
        value="{{ old('credits', '') }}">

        @error('credits')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add new subject</button>
    </div>

  </form>
@endsection
