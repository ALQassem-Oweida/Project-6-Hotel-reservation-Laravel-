@extends('layouts.app')

@section('content')

@section('content')


    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All Products</h1>
        <a class="btn btn-success" href="{{ route('admin.productsAdmin.create') }}">Add a Product</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>

                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Description</th>

                <th>Image</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($products as $row)
                    <tr>

                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->price }} $</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->description }}</td>


                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->image) }}"></td>

                        <td><a href="{{ route('admin.productsAdmin.edit', $row->id) }}"
                                class="btn btn-warning btn-sm">Edit</a></td>

                        <form class="float-end" method="post"
                            action="{{ route('admin.productsAdmin.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><input onclick="return confirm('Are you sure you want to delete this Product?')"
                                    type="submit" class="btn btn-danger btn-sm" value="Delete" /></td>
                        </form>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>







@endsection
