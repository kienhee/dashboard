@php
$moduleName = 'user';
@endphp

@extends('admin.layout.index')
@section('title', 'User Information')
@section('content')
<x-breadcrumb parentName="User Information" parentLink="dashboard.user.account-setting"
    childrenName="Change Password" />
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('dashboard.user.handle-change-password', Auth::user()->email) }}"
            enctype="multipart/form-data">
            <div class="card mb-4">
                @if (session('msgSuccess'))
                <div class="mt-3 mx-3 alert alert-success alert-dismissible" role="alert">
                    {{ session('msgSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('msgError'))
                <div class="mt-3 mx-3 alert alert-danger alert-dismissible" role="alert">
                    {{ session('msgError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h5 class="card-header">Change Password</h5>
                <hr class="my-0" />
                <div class="card-body">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="mb-3 form-password-toggle">
                            <label for="currentPassword" class="form-label">Current Password: <span
                                    class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="currentPassword"
                                    class="form-control @error('currentPassword') is-invalid @enderror"
                                    name="currentPassword"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="currentPassword" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @error('currentPassword')
                            <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label for="password" class="form-label">Current Password: <span
                                    class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
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


                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection