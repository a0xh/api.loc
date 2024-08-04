@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Genre') }}</div>

                <div class="card-body">
                    <form action="{{ route('genres.update', $genre) }}" method="POST">
                    	@method('PUT')
                    	@csrf
                    	<div class="mb-3">
						    <label for="title" class="form-label">Title</label>
						    <input id="title" type="text" name="title" value="{{ $genre['title'] ?? null }}" class="form-control" aria-describedby="title">
						</div>
						<div class="mb-3">
						    <label for="slug" class="form-label">Slug</label>
						    <input id="slug" type="text" name="slug" value="{{ $genre['slug'] ?? null }}" class="form-control" aria-describedby="slug">
						</div>
						<div class="mb-3">
						    <label for="description" class="form-label">Description</label>
						    <textarea id="description" name="description" rows="2" class="form-control">{{ $genre['description'] ?? null }}</textarea>
						</div>
						<div class="mb-3">
						    <label for="keywords" class="form-label">Keywords</label>
						    <input id="keywords" type="text" name="keywords" value="{{ $genre['keywords'] ?? null }}" class="form-control" aria-describedby="keywords">
						</div>
						<div class="mb-3">
						    <label for="content" class="form-label">Content</label>
						    <textarea id="content" name="content" rows="6" class="form-control">{{ $genre['content'] ?? null }}</textarea>
						</div>
						<div class="mb-3">
							<div class="form-check">
								<input id="status" type="radio" name="status" value="active" class="form-check-input"@checked($genre['status'] == 'active')>
								<label for="status" class="form-check-label">Active</label>
							</div>
							<div class="form-check">
								<input id="status" type="radio" name="status" value="inactive" class="form-check-input" @checked($genre['status'] == 'inactive')>
								<label for="status" class="form-check-label">Inactive</label>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
