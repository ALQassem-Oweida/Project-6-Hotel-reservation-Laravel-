@extends('layouts.app')

@section('content')

<div class="container col-6 mt-2">

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add a Product
		<a href="{{route('admin.productsAdmin.index')}}" class="btn btn-secondary btn-sm float-end" > Go Back</a>
	</div>
	<div class="card-body">
		<form method="post" action="{{ route('admin.productsAdmin.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Name</label>
				<div class="col-sm-10">
					<input type="text" name="product_name" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Description</label>
				<div class="col-sm-10">
					<textarea type="text" name="description" rows="6" class="form-control" ></textarea>
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Price</label>
				<div class="col-sm-10">
					<input type="text" name="price" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Quantity</label>
				<div class="col-sm-10">
					<input type="text" name="quantity" class="form-control" />
				</div>
			</div>

			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Image</label>
				<div class="col-sm-10">
					<input type="file" name="image" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary float-end" value="Add" />
			</div>
		</form>
	</div>
</div>
</div>
@endsection
