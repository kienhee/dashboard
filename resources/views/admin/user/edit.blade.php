@php
$moduleName = 'user';
@endphp

@extends('admin.layout.index')
@section('title', 'Update ' . $moduleName)
@section('content')
<x-breadcrumb parentName="User Management" parentLink="dashboard.user.index" childrenName="Update {{ $moduleName }}" />
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{ route('dashboard.user.update', $user->id) }}" enctype="multipart/form-data">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Update {{ $moduleName }}" link="dashboard.user.index"
                    linkName="List {{ $moduleName }}" />
                <div class="card-body">

                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ $user->avatar ?? asset('images/avatar-default.png') }}" alt="user-avatar"
                            class="d-block rounded " style="object-fit:cover" height="100" width="100"
                            id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden name="avatar"
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>

                </div>
                <hr class="my-0" />
                <div class="card-body">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="full_name" class="form-label">Full Name: <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="full_name" name="full_name"
                                value="{{ $user->full_name }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="" class="form-label">E-mail: </label>
                            <input class="form-control" type="text" disabled placeholder="john.doe@example.com"
                                value="{{ $user->email }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="group" class="form-label">User Group: <span class="text-danger">*</span></label>
                            <select class="form-select" name="group_id" id="group">
                                <option>Please select</option>
                                @foreach (getAllGroups() as $group)
                                <option {{ $user->group_id == $group->id ? 'selected' : '' }}
                                    value="{{ $group->id }}">
                                    {{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phone">Phone: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="phone" name="phone"
                                value="{{ $user->phone }}" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Update {{ $moduleName }}</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>

                </div>
        </form>
    </div>
</div>
</div>
<script>
    let imgInp = document.getElementById('upload');
        let preview = document.getElementById('uploadedAvatar');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
</script>
@endsection