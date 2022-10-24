@extends('layouts.app')
@extends('layouts.nav')
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
            <div class="card-header">Add a Category
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.categoryAdmin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="cat_name" class="form-control" />
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="cat_img" />
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
