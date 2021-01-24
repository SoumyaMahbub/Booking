@extends('auth.template')

@section('title', 'Login')

@section('content')

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<div class="card-header">
    <h1 class="text-center">Login asdasd</h1>
</div>
<div class="card-body row justify-content-center">
    <form method="POST" class="" action="{{route('login')}}" novalidate>
        @csrf
        <div class="form-group">
            <label for="email" class="">E-mail</label>
            <div class="">
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" autofocus />
                @error('email')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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
        </div>
        <div class="form-group row mb-0 justify-content-end w-100 mx-0">
            <div class="d-flex justify-content-end">
                <div class="col-md-9 px-0 mt-2">
                    <a href="{{route('register')}}">Create an Account</a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="far fa-address-card"> </i> {{ __('Login') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection