@php
$init = ['title'=>"Common list","listName"=>"Common list","routeIndex"=>"dashboard.commons.list","currentPage"=>"List"];
@endphp
@extends('admin.layout.index')
@section('title',$init['title'])
@section('content')
<x-breadcrumb listName="{{$init['listName']}}" routeIndex="{{$init['routeIndex']}}"
  currentPage="{{$init['currentPage']}}" />
<div class="card">
  <div class=" card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0 fw-bold">{{$init['title']}}</h5>
    <a href="{{route('dashboard.commons.add')}}" class="btn rounded-pill btn-primary d-flex align-items-center gap-1"><i
        class='bx bx-plus'></i> <span>New
        Item</span></a>
  </div>
  <div class="table-responsive text-nowrap card-body">
    <table id="table" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th>id</th>
          <th>avatar</th>
          <th>Name</th>
          <th>Slug</th>
          <th>column1</th>
          <th>column2</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>
            <div class="d-flex justify-content-start align-items-center product-name">
              <div class="avatar-wrapper">
                <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img
                    src="https://via.placeholder.com/640x480.png/000022?text=sit" alt="Product-13" class="rounded-2">
                </div>
              </div>
              <div class="d-flex flex-column">
                <h6 class="text-body text-nowrap mb-0">Amazon Fire TV</h6><small
                  class="text-muted text-truncate d-none d-sm-block">4K UHD smart TV, stream live TV without
                  cable</small>
              </div>
            </div>
          </td>
          <td>Edinburgh</td>
          <td>61</td>
          <td>2011-04-25</td>
          <td>$320,800</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>id</th>
          <th>Name</th>
          <th>Slug</th>
          <th>column1</th>
          <th>column2</th>
        </tr>
      </tfoot>
    </table>
  </div>

</div>
@section('script')
<script>
  $(function() {
$('#table').DataTable({
// processing: true,
// serverSide: true,
// ajax: '{!! route('dashboard.commons.data') !!}',
// columns: [
// { data: 'id', name: 'id' },
// { data: 'avatar', name: 'avatar' },
// { data: 'name', name: 'name' },
// { data: 'slug', name: 'slug' },
// { data: 'column1', name: 'column1' },
// { data: 'column2', name: 'column2' }
// ],
});
});
</script>
@endsection
@endsection