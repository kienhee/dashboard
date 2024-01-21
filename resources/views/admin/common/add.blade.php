@php
$init = ['title'=>"Common list","listName"=>"Common list","routeIndex"=>"dashboard.commons.list","currentPage"=>"Add new"];
@endphp
@extends('admin.layout.index')
@section('title',$init['title'])
@section('content')
<x-breadcrumb listName="{{$init['listName']}}" routeIndex="{{$init['routeIndex']}}"
  currentPage="{{$init['currentPage']}}" />
<div class="card">
  <div class=" card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0 fw-bold">{{$init['title']}}</h5>
    <a href="" class="btn rounded-pill btn-primary d-flex align-items-center gap-1"><i class='bx bx-plus'></i> <span>New
        Item</span></a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th style="width: 50px">#ID</th>
          <th style="width: 50px"></th>
          <th>name</th>
          <th>status</th>
          <th>created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td><strong><a href="" title="Click to read more">1</a></strong></td>
          <td><img src="https://cdn.iconscout.com/icon/free/png-256/free-avatar-372-456324.png"
              style="object-fit: cover" class="rounded-pill" width="30" height="30" data-bs-toggle="tooltip"
              data-bs-placement="top" data-bs-original-title="Sophia Wilkerson" alt=""></td>
          <td><strong data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Sophia Wilkerson">Angular
              Project</strong></td>
          <td>Albert Cook</td>
          <td>
          ngafy tajo
          </td>
          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                  Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                  Delete</a>
              </div>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
@endsection