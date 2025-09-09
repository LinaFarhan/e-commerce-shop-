@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
  <h1 class="mb-4">Contact Us</h1>

  {{-- عرض رسالة النجاح إذا فيه --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('contact.submit') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
      @error('name')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Message</label>
      <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
      @error('message')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>
@endsection
