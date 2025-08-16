@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card bg-white text-dark">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 mb-0 text-dark">Edit Post</h2>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Posts
                    </a>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="title" class="form-label text-dark">Title</label>
                        <input type="text" class="form-control bg-white text-dark @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $post->title) }}" 
                               placeholder="Enter post title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label text-dark">Content</label>
                        <textarea class="form-control bg-white text-dark @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="6" 
                                  placeholder="Write your post content here...">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save"></i> Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection