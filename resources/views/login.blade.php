@extends('layouts.app');
@section('title','Login')
@section('content')
<!-- Page content-->
    <div class="d-flex justify-content-center mt-5">
      <div class="card p-3 w-25">
        <h3>Login</h3>
        <form method="POST" action="{{ route('authenticate') }}">
    
           @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror "  id="email" name="email"  value="{{ old('email') }}"/>
             @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
            />
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>

@endsection
    
