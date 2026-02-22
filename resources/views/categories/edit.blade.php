@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">Edit Category</h4></div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $category->name) }}"
                                required
                                maxlength="80"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Current slug: <code>{{ $category->slug }}</code></div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
