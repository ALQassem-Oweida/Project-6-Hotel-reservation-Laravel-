@extends('layouts.app')

@extends('layouts.nav')

@section('content')


    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All Rooms</h1>
        <a class="btn btn-success" href="{{ route('admin.roomsAdmin.create') }}">Add a Room</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <th>Room Number</th>
                <th>Number of Beds</th>
                <th>Room Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Description</th>
                <th>Image</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>



                {{-- {{$categories}}
{{$rooms}} --}}


                @foreach ($rooms as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->num_of_beds }}</td>
                        <td>{{ $row->cat_name }}</td>
                        <td>{{ $row->room_price }} $</td>
                        <td>
                            @if ($row->status == 1)
                                {{ 'Avillable' }}
                            @else
                                {{ 'Bocked' }}
                            @endif
                        </td>

                        <td>{{ $row->room_description }}</td>

                        <td><img width="50px" height="50px" src="{{ asset('images/' . $row->room_image) }}"></td>
                        <td><a href="{{ route('admin.roomsAdmin.edit', $row->id) }}"
                                class="btn btn-warning btn-sm">Edit</a></td>
                        <form class="float-end" method="post" action="{{ route('admin.roomsAdmin.destroy', $row->id) }}">
                            @csrf
                            @method('DELETE')
                            <td><input onclick="return confirm('Are you sure you want to delete this Room?')" type="submit"
                                    class="btn btn-danger btn-sm" value="Delete" /></td>
                        </form>



                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>







@endsection
