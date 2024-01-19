@extends('admin.layout.index')
@section('title', 'User Information')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="javascript:void(0);">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="javascript:void(0);">Library</a>
        </li>
        <li class="breadcrumb-item active">Data</li>
    </ol>
</nav>

<section class="card">
    <x-alert />
    <form method="POST" class="card-body" action="{{ route('dashboard.user.account-setting-post', Auth::user()->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="d-flex align-items-start align-items-sm-center gap-4 mb-3">
                <img src="{{ Auth::user()->avatar ?? asset('images/avatar-default.png') }}" alt="user-avatar"
                    class="d-block rounded " style="object-fit:cover" height="100" width="100" id="uploadedAvatar" />
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" hidden name="avatar"
                            accept="image/png, image/jpeg" />
                    </label>
                </div>
            </div>
            <hr class="my-3" />
            <div class="mb-3 col-md-6">
                <label for="full_name" class="form-label">Full Name: <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="full_name" name="full_name"
                    value="{{ Auth::user()->full_name }}" />
                @error('career')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">E-mail:</label>
                <input class="form-control" type="text" disabled placeholder="john.doe@example.com"
                    value="{{ Auth::user()->email }}" />
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">Role:</label>
                <select class="form-select" disabled>
                    <option>Vui lòng chọn</option>
                    @foreach (getAllGroups() as $group)
                    <option {{ Auth::user()->group_id == $group->id ? 'selected' : '' }}>
                        {{ $group->name }}</option>
                    @endforeach
                </select>
                <input type="text" hidden value="{{ Auth::user()->group_id }}" name="group_id">
                @error('group_id')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="phone">Phone: <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" />
                @error('phone')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="facebook">facebook: </label>
                <input class="form-control" type="text" id="facebook" name="facebook"
                    value="{{ Auth::user()->facebook }}" />
                @error('facebook')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label" for="instagram">instagram: </label>
                <input class="form-control" type="text" id="instagram" name="instagram"
                    value="{{ Auth::user()->instagram }}" />
                @error('instagram')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="whatsapp">whatsapp: </label>
                <input class="form-control" type="text" id="whatsapp" name="whatsapp"
                    value="{{ Auth::user()->whatsapp }}" />
                @error('whatsapp')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="linkedin">linkedin: </label>
                <input class="form-control" type="text" id="linkedin" name="linkedin"
                    value="{{ Auth::user()->linkedin }}" />
                @error('linkedin')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="behance">behance: </label>
                <input class="form-control" type="text" id="behance" name="behance"
                    value="{{ Auth::user()->behance }}" />
                @error('behance')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="dribbble">dribbble: </label>
                <input class="form-control" type="text" id="dribbble" name="dribbble"
                    value="{{ Auth::user()->dribbble }}" />
                @error('dribbble')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label d-flex justify-content-between" for="description">
                    <p class="mb-0">Self
                        Description:<span class="text-danger">*</span class="text-lowerCase"></p>
                    <p class="mb-0">(<span id="quantity__char">{{ strLen(Auth::user()->description)
                            }}</span>/255)</p>
                </label>
                <textarea id="description" oninput="checkChar('description','quantity__char')" class="form-control"
                    name="description"
                    placeholder="About 255 characters">{{ old('description') ?? Auth::user()->description }}</textarea>

                @error('description')
                <p class="text-danger my-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>
    </form>
</section>

@section('script')
<script>
    let imgInp = document.getElementById('upload');
            let preview = document.getElementById('uploadedAvatar');
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
</script>
@endsection
@endsection