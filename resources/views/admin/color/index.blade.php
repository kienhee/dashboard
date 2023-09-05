@extends('layouts.admin.index')
@section('title', 'Quản lí bảng màu')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí bảng màu/</span> Danh sách bảng màu</h4>
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
            <h5 class="card-header px-0">Danh sách bảng màu</h5>
            <a href="{{ route('dashboard.color.add') }}" class="btn btn-outline-primary btn-sm"> Thêm mới bảng màu</a>
        </div>
        <hr class="my-0 mb-4" />

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tên màu</th>
                        <th>Mã code</th>
                        <th>Ngày tạo</th>
                        <th>Cài đặt</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($colors->count() > 0)

                        @foreach ($colors as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger "></i> <a
                                        href="{{ route('dashboard.category.edit', $item->id) }}"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex align-items-center gap-1">
                                    <span>{{ $item->code }} </span><span
                                        style="display:inline-block;width:15px;height:15px;border-radius:2px;background-color:{{ $item->code }}"></span>
                                </td>
                                <td>
                                    {{ $item->created_at->format('d-m-Y') ?? '' }}
                                </td>
                                <td>
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
                                                            Hiện bảng màu
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
                                                        {{ $item->trashed() ? 'Xóa vĩnh viễn' : 'Tạm ẩn bảng màu' }}
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

    </div>
@endsection
