@extends('auth.template')

@section('title', 'Login')

@section('content')

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="card-header">
    <h1 class="text-center">Register</h1>
</div>
<div class="card-body row justify-content-center">
    <form method="POST" class="" action="{{route('register')}}" novalidate>
        @csrf
        <div class="form-group">
            <div>
                <label for="name">Name</label>
                <div>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" :value="{{ old('name') }}" autofocus autocomplete="name">
                    @error('name')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <label for="email" class="">E-mail</label>
                <div class="">
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="{{ old('email') }}" autofocus />
                    @error('email')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                <label for="password">Password</label>
                <div>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" />
                    @error('password')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <label for="password_confirmation">Confirm Password</label>
                <div>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" autocomplete="new-password" />
                </div>
            </div>
        </div>
        <div class="form-group row mb-0 justify-content-end">
            <div class="col-md-8 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="far fa-address-card"> </i> {{ __('Register') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection