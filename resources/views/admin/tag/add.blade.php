@extends('layouts.admin.index')
@section('title', 'Thêm thẻ')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí thẻ /</span> Thêm thẻ</h4>
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
                    <h5 class="card-header px-0">Thêm thẻ</h5>
                    <a href="{{ route('dashboard.tag.index') }}" class="btn btn-outline-primary btn-sm">Danh sách thẻ
                    </a>
                </div>
                <hr class="my-0" />
                <!-- Account -->
                <div class="card-body">
                    <form action="{{ route('dashboard.tag.store') }}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Tên thẻ:</label>
                                <input class="form-control @error('name') is-invalid @enderror " type="text"
                                    id="name" name="name" value="{{ old('name') }}"
                                    placeholder="VD: Fashion, Brand, Gender" autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="type" class="form-label">Loại thẻ:</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type"
                                    id="type">
                                    <option value="">Vui lòng lựa chọn</option>
                                    <option value="product" {{ old('type') == 'product' ? 'selected' : '' }}>Dành
                                        cho sản phẩm</option>
                                    <option value="blog" {{ old('type') == 'blog' ? 'selected' : '' }}>Dành cho
                                        tin tức</option>
                                </select>
                                @error('type')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm thẻ</button>
                            <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
