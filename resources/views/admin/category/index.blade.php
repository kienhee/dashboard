@extends('layouts.admin.index')
@section('title', 'Quản lý danh mục')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý danh mục/</span> Danh sách danh mục</h4>
    <div class="card">
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
            <h5 class="card-header px-0">Danh sách danh mục</h5>
            <a href="{{ route('dashboard.category.add') }}" class="btn btn-outline-primary btn-sm"> Thêm mới danh mục</a>
        </div>
        <hr class="my-0 mb-4" />

        <form method="GET" class="mx-3 mb-4">
            <div class="row ">
                <div class="col-md-6 col-lg-3 mb-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" class="form-control" placeholder="Tên danh mục" name="keywords"
                            value="{{ Request()->keywords }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="status">
                        <option value="">Trạng thái</option>
                        <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ Request()->status == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động
                        </option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="sort">
                        <option value="">Bộ lọc</option>
                        <option value="desc" {{ Request()->sort == 'desc' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="asc" {{ Request()->sort == 'asc' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2 text-md-end">
                    <a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-secondary me-2">Đặt lại </a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>

            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Thuộc danh mục</th>
                        <th>Loại danh mục</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Cài đặt</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($categories->count() > 0)

                        @foreach ($categories as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger "></i> <a
                                        href="{{ route('dashboard.category.edit', $item->id) }}"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    {{ $item->description }}
                                </td>
                                <td>
                                    {{ $item->group->name ?? '' }}
                                </td>
                                <td class="text-center"><span
                                        class="badge  me-1 {{ $item->type == 'product' ? 'bg-label-info ' : ' bg-label-warning' }}">{{ $item->type == 'product' ? 'Sản phẩm' : 'Tin tức' }}</span>
                                </td>
                                <td><span
                                        class="badge  me-1 {{ $item->deleted_at == null ? 'bg-label-success ' : ' bg-label-primary' }}">{{ $item->deleted_at == null ? 'Hoạt động' : 'Đang ẩn' }}</span>
                                </td>

                                <td>
                                    {{ $item->created_at->format('d-m-Y') ?? '' }}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.category.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Sửa thông tin</a>

                                            @if (Auth::user()->id != $item->id)
                                                @if ($item->trashed() == 1)
                                                    <form class="dropdown-item"
                                                        action="{{ route('dashboard.category.restore', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn p-0  w-100 text-start" type="submit">
                                                            <i class='bx bx-revision'></i>
                                                            Hiện danh mục
                                                        </button>
                                                    </form>
                                                @endif
                                                <form class="dropdown-item"
                                                    action="{{ $item->trashed() ? route('dashboard.category.force-delete', $item->id) : route('dashboard.category.soft-delete', $item->id) }}"
                                                    method="POST"
                                                    @if ($item->trashed()) onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')" @endif>
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i
                                                            class="bx {{ $item->trashed() ? 'bx-trash' : 'bx bxs-hand' }}  me-1"></i>
                                                        {{ $item->trashed() ? 'Xóa vĩnh viễn' : 'Tạm ẩn danh mục' }}
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Không có dữ liệu!</td>
                        </tr>

                    @endif


                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {{ $categories->withQueryString()->links() }}
        </div>
    </div>
@endsection
