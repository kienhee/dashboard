@php
$moduleName = 'User Groups';
@endphp
@extends('admin.layout.index')
@section('title', 'Manage ' . $moduleName)

@section('content')
<x-breadcrumb parentName="Manage {{ $moduleName }}" parentLink="dashboard.group.index"
    childrenName="{{ $moduleName }} List" />
<div class="card">
    <x-alert />
    <div class="alert alert-danger alert-dismissible mx-3 mt-3" role="alert" bis_skin_checked="1">
        Note: Avoid deleting Administrator to prevent system errors!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @can('create', App\Models\Group::class)
    <x-header-table tableName="{{ $moduleName }}" link="dashboard.group.add" linkName="Create {{ $moduleName }}" />
    @else
    <div class="mx-3">
        <h5 class="card-header px-0">{{ $moduleName }}</h5>
    </div>
    <hr class="my-0" />
    @endcan

    <div class="table-responsive text-nowrap mt-4">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th class="px-1 text-center" style="width: 50px">#ID</th>
                    <th>Group Name</th>
                    @can('permission', App\Models\Group::class)
                    <th style="width: 150px">Permissions</th>
                    @endcan
                    <th style="width: 150px">Created Date</th>
                    <th style="width: 150px">Settings</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if ($groups->count() > 0)
                @foreach ($groups as $item)
                <tr>
                    <td> <a href="{{ route('dashboard.group.edit', $item->id) }}" style="color: inherit"
                            title="Click to view more"><strong>#{{ $item->id }}</strong>
                        </a>
                    </td>
                    <td><a href="{{ route('dashboard.group.edit', $item->id) }}" title="Click to view more"
                            style="color: inherit"> <strong>{{ $item->name }}</strong>
                        </a></td>
                    @can('permission', App\Models\Group::class)
                    <td>
                        <a href="{{ route('dashboard.group.permissions', $item->id) }}"
                            class="btn btn-primary btn-sm">Set
                            Permissions</a>
                    </td>
                    @endcan
                    <td>
                        <p class="m-0">{{ $item->created_at->format('d M Y') }}</p>
                        <small>{{ $item->created_at->format('h:i A') }}</small>
                    </td>
                    <td class="text-start">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                @can('update', App\Models\Group::class)
                                <a class="dropdown-item" href="{{ route('dashboard.group.edit', $item->id) }}"><i
                                        class="bx bx-edit-alt me-1"></i>
                                    Edit Information</a>
                                @else
                                <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-edit-alt me-1"></i>
                                    Not Allowed</a>
                                @endcan
                                @can('delete', App\Models\Group::class)
                                <form class="dropdown-item" action="{{ route('dashboard.group.delete', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete permanently?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn p-0  w-100 text-start" type="submit">
                                        <i class="bx bx-trash me-1"></i>
                                        Delete Permanently
                                    </button>
                                </form>
                                @else
                                <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-trash me-1"></i>
                                    Not Allowed</a>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center">No data available!</td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection