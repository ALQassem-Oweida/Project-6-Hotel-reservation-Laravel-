@extends('layouts.app')

@extends('layouts.nav')

@section('content')


    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="text-center">All Reservations</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>

                <th>Name</th>
                <th>Room Number</th>
                <th>Total Amount</th>
                <th>Date of Booking</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th></th>
                {{-- <th></th> --}}
            </thead>
            <tbody>
                @foreach ($reservations as $row)
                    <tr>

                        <td>{{ $row->name }}</td>
                        <td>{{ $row->room_id }}</td>
                        <td>{{ $row->totalAmount }} $</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->checkIn_date }}</td>
                        <td>{{ $row->checkOut_date }}</td>

                        {{-- <td><a href="{{ route('admin.productsAdmin.edit', $row->id) }}" --}}
                                {{-- class="btn btn-warning btn-sm">Edit</a></td> --}}

                        <form class="float-end" method="post"
                            action="{{ route('admin.booking.destroy', $row->id) }}">
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
