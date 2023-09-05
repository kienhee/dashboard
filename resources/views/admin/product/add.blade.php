@extends('layouts.admin.index')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí sản phẩm /</span> Thêm mới sản phẩm</h4>
    <div class="row">
        <div class="col-md-10">
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
                    <h5 class="card-header px-0">Thêm mới sản phẩm</h5>
                    <a href="{{ route('dashboard.category.index') }}" class="btn btn-outline-primary btn-sm">Danh sách sản
                        phẩm</a>
                </div>
                <hr class="my-0" />
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('dashboard.category.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Tên sản phẩm:</label>
                                <input class="form-control @error('name') is-invalid @enderror " type="text"
                                    oninput="createSlug('name','slug')" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Tên sản phẩm" autofocus />
                                @error('name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="slug" class="form-label">Đường dẫn URL:</label>
                                <input class="form-control @error('slug') is-invalid @enderror" type="text"
                                    id="slug" name="slug" value="{{ old('slug') }}" placeholder="Ten-san-pham" />
                                @error('slug')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Mô tả ngắn:</label>

                                <textarea class="form-control @error('description') is-invalid @enderror " id="description" rows="3"
                                    name="description" placeholder="Mô tả ngắn về sản phẩm">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="content-product" class="form-label">Thông tin sản phẩm :</label>
                                <textarea class="form-control @error('content') is-invalid @enderror " id="content-product" rows="3"
                                    name="content" placeholder="Mô tả chi tiết: Thông tin xuất xứ, chất liệu, ..v.v">{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="product_code" class="form-label">Mã sản phẩm:</label>
                                <input class="form-control @error('product_code') is-invalid @enderror " type="text"
                                    oninput="createSlug('product_code','slug')" id="product_code" name="product_code"
                                    value="{{ old('product_code') }}" placeholder="Mã sản phẩm" />
                                @error('product_code')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="product_sku" class="form-label">Mã SKU:</label>
                                <input class="form-control @error('product_sku') is-invalid @enderror " type="text"
                                    oninput="createSlug('product_sku','slug')" id="product_sku" name="product_sku"
                                    value="{{ old('product_sku') }}" placeholder="Mã SKU" />
                                @error('product_sku')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="quantity" class="form-label">Số lượng:</label>
                                <input class="form-control @error('quantity') is-invalid @enderror " type="text"
                                    oninput="createSlug('quantity','slug')" id="quantity" name="quantity"
                                    value="{{ old('quantity') }}" placeholder="Số lượng" />
                                @error('quantity')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="category_id" class="form-label">Danh mục</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                    id="category_id">
                                    <option value="">Vui lòng lựa chọn</option>
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
                                <label for="select-multiple" class="form-label">Màu sắc:</label>
                                <select id="select-multiple" multiple name="color" placeholder="Thêm màu sắc"
                                    data-search="true" data-silent-initial-value-set="true">
                                    @foreach (getAllColors() as $color)
                                        <option value="{{ $color->name }}-{{ $color->code }}">{{ $color->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="select-multiple" class="form-label">Kích thước:</label>
                                <select id="select-multiple" multiple name="size" placeholder="Thêm kích thước"
                                    data-search="false" data-silent-initial-value-set="true">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                    <option value="5">Option 5</option>
                                    <option value="6">Option 6</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="select-multiple" class="form-label">Tags:</label>
                                <select id="select-multiple" multiple name="size" placeholder="Thêm kích thước"
                                    data-search="false" data-silent-initial-value-set="true">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                    <option value="5">Option 5</option>
                                    <option value="6">Option 6</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="select-multiple" class="form-label">Giới tính:</label>
                                <div class="form-check form-check-inline ms-3">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">Nữ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                        value="option3">
                                    <label class="form-check-label" for="inlineCheckbox3">Tất cả</label>
                                </div>
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm mới sản phẩm</button>
                            <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
