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
    <form method="POST" class="" action="{{route('register')}}">
        <div class="form-group">
            <div>
                <label for="name">Name</label>
                <div>
                    <input id="name" class="" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                </div>
            </div>
            <div class="mt-3">
                <label for="email" class="">E-mail</label>
                <div class="">
                    <input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
                </div>
            </div>

            <div class="mt-3">
                <label for="password">Password</label>
                <div>
                    <input id="password" class="" type="password" name="password" required autocomplete="current-password" />
                </div>
            </div>
            <div class="mt-3">
                <label for="password_confirmation">Confirm Password</label>
                <div>
                    <input id="password_confirmation" class="" type="password" name="password_confirmation" required autocomplete="new-password" />
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