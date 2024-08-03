@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Genres') }}</div>

                <div class="card-body">
                    <table class="table">
                    	<thead>
						    <tr>
						    	<th scope="col">#ID</th>
						    	<th scope="col">Title</th>
						    	<th scope="col">User</th>
						    	<th scope="col">Status</th>
						    	<th scope="col">Actions</th>
						    </tr>
						</thead>
						<tbody>
							@foreach ($genres as $genre)
								<tr>
									<th scope="row">{{ $genre->id }}</th>
									<td>{{ str()->limit($genre->title, 30) }}</td>
									<td>
										@if ($genre->status !== 'active')
											<span class="badge bg-warning text-dark">Inactive</span>
										@else
											<span class="badge bg-dark">Active</span>
										@endif
									</td>
									<td>{{ $genre->user->login }}</td>
									<td>
					                    <div class="btn-group" role="group" aria-label="btn-group">
					                        <div>
					                        	<a href="{{ route('genres.show', $genre) }}" class="btn btn-outline-primary btn-sm">Show</a>
					                        </div>

					                        <div>
					                        	<a href="{{ route('genres.edit', $genre) }}" class="btn btn-outline-success btn-sm">Edit</a>
					                        </div>

					                        <div>
					                        	<form action="{{ route('genres.delete', $genre) }}" method="post">

						                            @method('DELETE')
						                            @csrf

						                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
						                        </form>
						                    </div>
					                    </div>
									</td>
								</tr>
							@endforeach
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
