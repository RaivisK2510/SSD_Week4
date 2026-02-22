@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h1 class="mb-3">About</h1>
            <p class="lead text-muted">
                This site is a Laravel Blog project built for learning practical CRUD, routing, views, and styling.
            </p>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">What’s inside</h5>
                    <ul class="mb-0">
                        <li>Blog posts CRUD</li>
                        <li>Categories CRUD</li>
                        <li>Authentication-protected actions</li>
                        <li>Custom Bootstrap styling</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
