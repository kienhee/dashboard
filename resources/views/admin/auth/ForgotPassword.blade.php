@extends('admin.layout.index')
@section('title',$title)
@section('content')
<!-- Forgot Password -->
<div class="card">
    <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
            <a href="{{ route('auth.loginView') }}" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder" style="text-transform: uppercase">{{
                    getEnv('APP_NAME_ADMIN') }}</span>
            </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">Forgot Password? 🔒</h4>
        <p class="mb-4">Enter your email, and we'll send you instructions to reset your password</p>
        <form id="formAuthentication" class="mb-3" onsubmit="handleSubmitForm()"
            action="{{ route('auth.ForgotPassword') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                @error('email')
                <p class="text-danger my-2">{{ $message }}</p>
                @enderror
                @if (session('success'))
                <p class="text-success my-2">{{ session('success') }}</p>
                @endif
            </div>
            <button id="submitBtn"
                class="btn btn-primary d-grid w-100 d-flex justify-content-center gap-2 align-items-center"
                type="submit">
                <span>Send Reset Link</span>
                <div id="btn_spinner" class="spinner-border spinner-border-sm text-secondary d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
        <div class="text-center">
            <a href="{{ route('auth.loginView') }}" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Back to login
            </a>
        </div>
    </div>
</div>

<!-- /Forgot Password -->
@section('script')
<script>
    function handleSubmitForm() {
        $('#btn_spinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);
    }
</script>
@endsection
@endsection