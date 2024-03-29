@extends('admin.layout.index')
@section('title', 'Change Password')
@section('content')
<x-breadcrumb parentName="Users" parentLink="dashboard.user.index" childrenName="{{ Auth::user()->full_name }}" />
<section class="card">
    <x-alert />
    <form method="POST" class="card-body"
        action="{{ route('dashboard.user.handle-change-password', Auth::user()->email) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="mb-3 form-password-toggle">
                <label for="currentPassword" class="form-label">Current Password: <span
                        class="text-danger">*</span></label>
                <div class="input-group input-group-merge">
                    <input type="password" id="currentPassword"
                        class="form-control @error('currentPassword') is-invalid @enderror" name="currentPassword"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="currentPassword" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('currentPassword')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
                <label for="password" class="form-label">Current Password: <span class="text-danger">*</span></label>
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
                <label for="password_confirmation" class="form-label">Current Password: <span
                        class="text-danger">*</span></label>
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
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save Change</button>
            </div>
        </div>
    </form>
</section>
@endsection