@extends('layouts.admin.index')
@section('title', 'Thêm mới thành viên')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lí người dùng /</span> Thêm mới thành viên</h4>
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
                    <h5 class="card-header px-0">Thêm mới thành viên</h5>
                    <a href="{{ route('dashboard.user.index') }}" class="btn btn-outline-primary btn-sm">Danh sách người
                        dùng</a>
                </div>
                <hr class="my-0" />
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('dashboard.user.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="full_name" class="form-label">Họ và tên:</label>
                                <input class="form-control @error('full_name') is-invalid @enderror " type="text"
                                    id="full_name" name="full_name" value="{{ old('full_name') }}"
                                    placeholder="Nguyen Van A" autofocus />
                                @error('full_name')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="NguyenVanA@gmail.com" />
                                @error('email')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="group" class="form-label">Nhóm người dùng</label>
                                <select class="form-select @error('     ') is-invalid @enderror" name="group_id"
                                    id="group">
                                    <option value="">Vui lòng lựa chọn</option>
                                    @foreach (getAllGroups() as $group)
                                        <option {{ old('group_id') == $group->id ? 'selected' : '' }}
                                            value="{{ $group->id }}">
                                            {{ $group->name }}</option>
                                    @endforeach

                                </select>
                                @error('group_id')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phone_number">Số điện thoại:</label>
                                <input class="form-control @error('phone_number') is-invalid @enderror" type="text"
                                    id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                    placeholder="000-000-0000">
                                @error('phone_number')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-password-toggle mb-3 col-md-6">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-password-toggle mb-3 col-md-6">
                                <label class="form-label" for="password_confirmation">Xác nhận mật khẩu</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm mới thành viên</button>
                            <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
