@php
$moduleName = 'User Groups';
@endphp
@extends('admin.layout.index')
@section('title', 'Create New ' . $moduleName)

@section('content')
<x-breadcrumb parentName="Manage {{ $moduleName }}" parentLink="dashboard.group.index"
    childrenName="Create New {{ $moduleName }}" />
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <x-alert />
            <x-header-table tableName="Create New {{ $moduleName }}" link="dashboard.group.index"
                linkName="List {{ $moduleName }}" />
            <!-- Account -->
            <div class="card-body">
                <form id="formAccountSettings" action="{{ route('dashboard.group.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">Group Name: <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror " type="text" id="name"
                                name="name" value="{{ old('name') }}" placeholder="User Group Name" autofocus />
                            @error('name')
                            <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Add User Group</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection