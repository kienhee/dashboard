@extends('layouts.admin.index')
@section('title', 'Thêm mới danh mục')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí danh mục /</span> Thêm mới danh mục</h4>
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
                    <h5 class="card-header px-0">Thêm mới danh mục</h5>
                    <a href="{{ route('dashboard.category.index') }}" class="btn btn-outline-primary btn-sm">Danh sách danh
                        mục</a>
                </div>
                <hr class="my-0" />
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('dashboard.category.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Tên danh mục:</label>
                                <input class="form-control @error('name') is-invalid @enderror " type="text" oninput="createSlug('name','slug')"
                                    id="name" name="name" value="{{ old('name') }}" placeholder="Tên danh mục"
                                    autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="slug" class="form-label">Đường dẫn URL:</label>
                                <input class="form-control @error('slug') is-invalid @enderror" type="text"
                                    id="slug" name="slug" value="{{ old('slug') }}" placeholder="Ten-danh-muc" />
                                @error('slug')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="category_id" class="form-label">Thuộc danh mục</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                    id="category_id">
                                    <option value="">Vui lòng lựa chọn</option>
                                    <option value="0">Danh mục gốc</option>
                                    @foreach (getAllCategories() as $category)
                                        <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">
                                            {{ $category->name }} -
                                            {{ $category->type == 'product' ? 'Sản phẩm' : 'Tin tức' }}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="type" class="form-label">Loại danh mục:</label>
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
                            <div class="col-12">
                                <label for="description" class="form-label">Mô tả:</label>

                                <textarea class="form-control @error('description') is-invalid @enderror " id="description" rows="3"
                                  name="description"   placeholder="Mô tả danh mục">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm mới danh mục</button>
                            <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
