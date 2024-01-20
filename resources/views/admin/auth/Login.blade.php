@extends('admin.layout.index')
@section('title', $title)
@section('content')
<!-- Login -->
<div class="card">
    <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
            <a href="" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder"
                    style="text-transform: uppercase">{{getEnv('APP_NAME_ADMIN')}}</span>
            </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Welcome back! 👋</h4>
        <p class="mb-4"> Please log in to your account and get started with work.</p>

        <form id="formAuthentication" class="mb-3" action="{{ route('auth.login') }}" method="POST">
            @csrf()
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="Enter your email " value="{{ old('email') }}" autofocus />
                @error('email')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="{{ route('auth.ForgotPassword') }}">
                        <small>Forgot Password?</small>
                    </a>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('password')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror

                @if (session('success'))
                <p class="text-success my-2">{{ session('success') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                    <label class="form-check-label" for="remember"> Remember me</label>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
            </div>
        </form>

    </div>
</div>
<!-- /Login -->
@endsection