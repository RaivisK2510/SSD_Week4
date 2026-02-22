@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Categories</h2>
            <p class="text-muted mb-0">Browse topics used in the blog</p>
        </div>
        @auth
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> New Category
            </a>
        @endauth
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-3">
        @forelse($categories as $category)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 category-card">
                    <div class="card-body">
                        <h5 class="card-title mb-1">
                            <a class="text-decoration-none" href="{{ route('categories.show', $category) }}">
                                {{ $category->name }}
                            </a>
                        </h5>
                        <p class="text-muted small mb-0">Slug: {{ $category->slug }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3 d-flex gap-2">
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-primary">View</a>
                        @auth
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="ms-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this category?')">
                                    Delete
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0">No categories yet.</div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $categories->links() }}
    </div>
</div>
@endsection
