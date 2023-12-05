@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">{{ $post_type->name ?? 'Posts' }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.post-types.posts.index', ['post_type'=> $post_type]) }}">{{ $post_type->name ?? 'Posts' }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('panel.post-types.categories.index', ['post_type'=> $post_type]) }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
@php
$action = 'panel.post-types.categories.store';
$params = ['post_type' => $post_type];
if(request()->routeIs('panel.post-types.categories.edit')){
    $action = 'panel.post-types.categories.update';
    $params['category'] = $category ?? null;
}
$action_route = route($action, $params);
@endphp
<form method="POST" action="{{ $action_route }}">
    @csrf
    @method((request()->routeIs('panel.post-types.categories.edit') ? 'PUT' : 'POST'))
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="">Nama</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',($category->name ?? null)) }}" />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection