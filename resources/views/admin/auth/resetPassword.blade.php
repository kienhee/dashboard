@extends('admin.layout.index')
@section('title',$title)
@section('content')
<div class="card">
    <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">

            <span class="app-brand-text demo text-body fw-bolder" style="text-transform: uppercase">Reset
                Password</span>
        </div>
        <!-- /Logo -->
        <form id="formAuthentication" class="mb-3" action="{{ route('auth.PostResetPassword') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ request()->email }}">
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
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

            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password_confirmation">confirmation</label>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password_confirmation" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('password_confirmation')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror

            </div>
            <button class="btn btn-primary d-grid w-100">Reset Password</button>
        </form>

    </div>
</div>
<!-- /Forgot Password -->
@endsection