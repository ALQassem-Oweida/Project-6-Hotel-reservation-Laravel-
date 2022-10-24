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
            <div class="card-header">Add a Room
                <a href="{{ route('admin.roomsAdmin.index') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.roomsAdmin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form">Number of beds</label>
                        <div class="col-sm-10">
                            <input type="text" name="num_of_beds" class="form-control" />
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form">Select a Category</label>
                        <div class="col-sm-10">
                            <select name="cat_name" class="form-control">

                                <option value="none" selected="" disabled="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach


                            </select>
                         
                        </div>
                    </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-label-form">Description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="room_description" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-label-form">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="room_price" class="form-control" />
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-2 col-label-form">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="room_image" />
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
