@extends('admin.layouts.app')

@section('page', 'Edit Page Content')

@section('content')

<div class="card p-4">
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">
        <i class="ri-arrow-left-line"></i> Back
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', ucwords($page->title)) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" rows="5">{{ old('content', ucwords($page->content)) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Page</button>
        </form>
    </div>
</div>

@endsection