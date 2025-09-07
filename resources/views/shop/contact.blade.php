@extends('layouts.app')

@section('title', 'Contact')

@section('content')
  <h1>Contact Us</h1>

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ route('shop.contact.submit') }}" class="card p-4">
    @csrf
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input name="name" class="form-control" value="{{ old('name') }}">
      @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input name="email" type="email" class="form-control" value="{{ old('email') }}">
      @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Message</label>
      <textarea name="message" class="form-control" rows="5">{{ old('message') }}</textarea>
      @error('message') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-primary">Send</button>
  </form>
@endsection