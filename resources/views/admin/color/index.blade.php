@extends('layouts.admin.index')
@section('title', 'Quản lý bảng màu')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý bảng màu/</span> Danh sách bảng màu</h4>
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
                                        href="{{ route('dashboard.color.edit', $item->id) }}"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <span>{{ $item->code }} </span>
                                    <span class="w-px-20 h-px-20  d-inline-block"
                                        style="border-radius:2px;background-color:{{ $item->code }}"></span>
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
                                                href="{{ route('dashboard.color.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Sửa thông tin</a>
                                            <form class="dropdown-item"
                                                action="{{ route('dashboard.color.delete', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')">
                                                @csrf
                                                @method('delete')
                                                <button class="btn p-0  w-100 text-start" type="submit">
                                                    <i class="bx bx-trash  me-1"></i>
                                                    Xóa vĩnh viễn
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Không có dữ liệu!</td>
                        </tr>

                    @endif


                </tbody>
            </table>
        </div>

    </div>
@endsection
