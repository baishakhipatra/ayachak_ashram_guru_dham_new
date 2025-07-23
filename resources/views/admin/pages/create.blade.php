@extends('admin.layouts.app')

@section('page', 'Create Page')

@section('content')

<div class="card p-4">
    <div class="card-footer d-flex justify-content-end">
        <a href="{{ route('admin.pages.index') }}" class="btn btn-danger">
        <i class="ri-arrow-left-line"></i> Back
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.pages.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Page Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Page Content</label>
                <textarea name="content" id="content-editor" class="form-control" rows="6"></textarea>
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection

<!-- CKEditor -->
@section('script')
<script>
    CKEDITOR.replace('content-editor');
</script>
@endsection