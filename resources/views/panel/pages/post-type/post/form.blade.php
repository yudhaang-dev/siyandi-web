@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">{{ $post_type->name ?? 'Posts' }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.post-types.posts.index', ['post_type'=> $post_type]) }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post_type->name ?? 'Posts' }}</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('panel.post-types.posts.index', ['post_type'=> $post_type]) }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
@php
$action = 'panel.post-types.posts.store';
$params = ['post_type' => $post_type];
if(request()->routeIs('panel.post-types.posts.edit')){
    $action = 'panel.post-types.posts.update';
    $params['post'] = $post ?? null;
}
$action_route = route($action, $params);
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ $action_route }}" enctype="multipart/form-data">
    @csrf
    @method((request()->routeIs('panel.post-types.posts.edit') ? 'PUT' : 'POST'))
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-body">
                    @if ($post_type->meta->category == true)
                    <div class="mb-3">
                        <label for="select-category">Kategori</label>
                        <select id="select-category" class="form-select" name="category_id"></select>
                    </div>            
                    @endif
                    <div class="mb-3">
                        <label for="">Judul</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',($post->title ?? null)) }}" />
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content">{!! old('content',($post->content ?? null)) !!}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select id="status" class="form-select" name="status">
                            <option value="0" @selected(0 == old('status', ($post->status ?? 0)))>Draf</option>
                            <option value="1" @selected(1 == old('status', ($post->status ?? 0)))>Terbit</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="publishedAt">Tanggal Terbit</label>
                        <input id="publishedAt" type="text" class="form-control" name="published_at" value="{{ old('published_at', (isset($post->published_at) ? $post->published_at->format('Y-m-d H:i') : date('Y-m-d H:i'))) }}" />
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </div>
            @if ($post_type->meta->media == 'image')
            <div class="mb-3">
                <img id="image-preview" src="{{ $post->image ??  'https://placehold.co/600x400' }}" class="img-fluid" />
                <input type="file" class="form-control" name="image" />
            </div>            
            @endif
        </div>
    </div>
</form>

@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" integrity="sha512-ZbehZMIlGA8CTIOtdE+M81uj3mrcgyrh6ZFeG33A4FHECakGrOsTPlPQ8ijjLkxgImrdmSVUHn1j+ApjodYZow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.3.0/select2-bootstrap-5-theme.min.css" integrity="sha512-z/90a5SWiu4MWVelb5+ny7sAayYUfMmdXKEAbpj27PfdkamNdyI3hcjxPxkOPbrXoKIm7r9V2mElt5f1OtVhqA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js" integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('#publishedAt').flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true
    });
    $('textarea#content').summernote({
        height:400
    });
    $(`input[name="image"]`).change(function () {
        let img = $('#image-preview');
        img.attr('src', `http://siyandi.disnaker.tanggamus.local/storage/citizens/image/1871012708880005_1700214035.png`);
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    @if ($post_type->meta->category == true)
    const selectCategory = $('#select-category').select2({
        theme : 'bootstrap-5',
        width : '100%',
        allowClear : true,
        placeholder : 'Pilih Kategori',
        ajax : {
            url : `{{ route('panel.post-types.categories.select2', ['post_type'=> $post_type]) }}`
        }
    });
    @endif
</script>
@endpush