@extends('layouts.app')

@section('content')

    <div class="container col-6 mt-2">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">Edit Product details
                <a href="{{ route('admin.productsAdmin.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.productsAdmin.update', $products->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')


                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="product_name" class="form-control"
                                value="{{ $products->product_name }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Price : </label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" value="{{ $products->price }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Description : </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" rows="3">{{ $products->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Quantity : </label>
                        <div class="col-sm-10">
                            <input type="text" name="quantity" class="form-control" value="{{ $products->quantity }}" />
                        </div>
                    </div>


                    <img src="{{ asset('images/' . $products->image) }}" width="100" class="img-thumbnail" />
                    <div class="form-group mb-5">
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <input type="hidden" name="hidden_img" value="{{ $products->image }}" />

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary float-end" value="Update details" />
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
