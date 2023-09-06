@extends('layouts.admin.index')
@section('title', 'Thêm kích thước')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí kích thước /</span> Thêm kích thước</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                @if (session('msgSuccess'))
                    <div class=" mt-3 mx-3 alert alert-success alert-dismissible" role="alert">
                        {{ session('msgSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('msgError'))
                    <div class="mt-3 mx-3  alert alert-danger alert-dismissible" role="alert">
                        {{ session('msgError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mx-3">
                    <h5 class="card-header px-0">Thêm kích thước</h5>
                    <a href="{{ route('dashboard.size.index') }}" class="btn btn-outline-primary btn-sm">Danh sách kích
                        thước
                    </a>
                </div>
                <hr class="my-0" />
                <!-- Account -->
                <div class="card-body">
                    <form action="{{ route('dashboard.size.store') }}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Tên kích thước:</label>
                                <input class="form-control @error('name') is-invalid @enderror " type="text"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="VD: Size L, M, XL, 1.5, 25 ...v.v" autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm kích thước</button>
                            <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
