@extends('layouts.admin.index')
@section('title', 'Thêm mới sản phẩm')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí sản phẩm /</span> Thêm mới sản phẩm</h4>
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
                    <h5 class="card-header px-0">Thêm mới sản phẩm</h5>
                    <a href="{{ route('dashboard.category.index') }}" class="btn btn-outline-primary btn-sm">Danh sách sản
                        phẩm</a>
                </div>
                <hr class="my-0" />
                <!-- Account -->
                <div class="card-body">
                    <form action="{{ route('dashboard.product.store') }}" method="POST">
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
                                    id="product_code" name="product_code" value="{{ old('product_code') }}"
                                    placeholder="Mã sản phẩm" />
                                @error('product_code')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="product_sku" class="form-label">Mã SKU:</label>
                                <input class="form-control @error('product_sku') is-invalid @enderror " type="text"
                                    id="product_sku" name="product_sku" value="{{ old('product_sku') }}"
                                    placeholder="Mã SKU" />
                                @error('product_sku')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="quantity" class="form-label">Số lượng:</label>
                                <input class="form-control @error('quantity') is-invalid @enderror " type="text"
                                    id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Số lượng" />
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
                                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
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
                                <select id="select-multiple" class="@error('colors') is-invalid @enderror" multiple
                                    name="colors" placeholder="Chọn màu sắc" data-search="true"
                                    data-silent-initial-value-set="true">
                                    @foreach (getAllColors() as $color)
                                        <option value="{{ $color->name }}-{{ $color->code }}">{{ $color->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('colors')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="select-multiple" class="form-label">Kích thước:</label>
                                <select id="select-multiple" class="@error('sizes') is-invalid @enderror" multiple
                                    name="sizes" placeholder="Chọn Kích thước" data-search="true"
                                    data-silent-initial-value-set="true">
                                    @foreach (getAllSizes() as $size)
                                        <option value="{{ $size->name }}">{{ $size->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('sizes')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-12">
                                <label for="select-multiple" class="form-label">Giới tính:</label>
                                <select id="select-multiple" class="@error('genders') is-invalid @enderror" multiple
                                    name="genders" placeholder="Chọn giới tính" data-search="false"
                                    data-silent-initial-value-set="true">
                                    <option value="male">Nam
                                    </option>
                                    <option value="female">Nữ
                                    </option>

                                </select>
                                @error('genders')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label for="select-multiple" class="form-label">Tags:</label>
                                <select id="select-multiple" multiple name="tags" placeholder="Chọn thẻ"
                                    data-search="true" data-silent-initial-value-set="true">
                                    @foreach (getAllTags() as $tag)
                                        <option value="{{ $tag->name }}">{{ $tag->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div> --}}
                            <div class="mb-3 col-md-6">
                                <label for="regular_price" class="form-label">Giá thường ("Giá bán công khai"):</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">$</span>
                                    <input type="text"name="regular_price"  value="{{ old('regular_price') }}" class="form-control" placeholder="0.000">
                                    <span class="input-group-text">VND</span>
                                </div>
                                @error('regular_price')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="sale" class="form-label">Sale (%):</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">%</span>
                                    <input type="text" name="sale" class="form-control" value="{{ old('sale') }}" placeholder="0.000">
                                </div>
                                @error('sale')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check form-switch mb-3 ms-3 col-md-6">
                                <input class="form-check-input" type="checkbox" name="is_Price_includes_taxes"
                                    id="is_Price_includes_taxes">
                                <label class="form-check-label" for="is_Price_includes_taxes">Giá đã bao gồm thuế</label>
                            </div>
                            <div class="mb-3 col-md-12 " id="tax">
                                <label for="tax" class="form-label">Thuế (%):</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">%</span>
                                    <input type="text" name="tax" class="form-control" value="{{ old('tax') }}" placeholder="0.00">
                                </div>
                                @error('tax')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm mới sản phẩm</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
    <script>
        const checkbox = document.getElementById('is_Price_includes_taxes')
        const input_tax = document.getElementById('tax');
        checkbox.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                input_tax.classList.add("d-none");
            } else {
                input_tax.classList.remove("d-none");

            }
        })
    </script>
@endsection
