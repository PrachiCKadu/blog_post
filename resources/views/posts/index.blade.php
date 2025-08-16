@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Create New Post
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    @foreach($posts as $post)
    <div class="col-md-6 col-lg-4">
        <div class="card post-card h-100 text-white">
            <div class="card-body">
                <div class="post-header mb-3">
                    <!-- Clickable title to open modal -->
                    <h5 class="card-title mb-2 text-white" 
                        style="cursor: pointer;" 
                        data-bs-toggle="modal" 
                        data-bs-target="#postModal{{ $post->id }}">
                        {{ $post->title }}
                    </h5>
                    <small class="d-block mb-3" style="color: #a1a1aa;">
                        <i class="far fa-clock"></i> {{ $post->created_at->format('M d, Y') }}
                    </small>
                </div>
                <p class="card-text mb-4" style="color: #d1d5db;">{{ Str::limit($post->body, 100) }}</p>

                <div class="post-actions">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm delete-post" 
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal for full post -->
<div class="modal fade" id="postModal{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel{{ $post->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel{{ $post->id }}">{{ $post->title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>{!! $post->description !!}</div>
            </div>
            <div class="modal-footer">
                <small class="text-white">Posted on {{ $post->created_at->format('M d, Y') }}</small>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>

@if($posts->isEmpty())
<div class="text-center py-5">
    <div class="empty-state mb-4">
        <i class="fas fa-inbox fa-3x text-secondary"></i>
    </div>
    <h3 class="text-secondary">No Posts Yet</h3>
    <p class="text-secondary">Create your first post to get started!</p>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mt-3">
        <i class="fas fa-plus"></i> Create Post
    </a>
</div>
@endif

<style>
    .post-card {
        transition: all 0.3s ease;
        border: none;
        background: linear-gradient(145deg, #2d2e32, #25262a);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .post-header {
        position: relative;
    }

    .post-header::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 50px;
        height: 3px;
        background: var(--primary-color);
        transition: width 0.3s ease;
    }

    .post-card:hover .post-header::after {
        width: 100px;
    }

    .post-actions {
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .post-card:hover .post-actions {
        opacity: 1;
    }

    .btn-outline-primary, .btn-outline-danger {
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover, .btn-outline-danger:hover {
        transform: translateY(-2px);
    }

    .empty-state {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .delete-post {
        transition: all 0.3s ease;
    }

    .delete-post:hover {
        background-color: #ef4444;
        color: white;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.post-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endsection
