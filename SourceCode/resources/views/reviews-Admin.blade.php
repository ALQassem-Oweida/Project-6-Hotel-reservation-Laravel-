@extends('layouts.app')
@extends('layouts.nav')

@section('content')


    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif

        <h1 class="text-center">All Reviews</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm float-end"> Go Back</a>
        <br><br>

        <table class="table table-striped">
            <thead>
                <th>Reviewed by</th>
                <th>Room Number</th>
                <th>Review</th>
                <th>Date</th>
                <th></th>
            </thead>
            <tbody>





                @foreach ($reviews as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->room_id }}</td>
                        <td>{{ $row->Review }}</td>
                        <td>{{ $row->created_at }}</td>
                        <form class="float-end" method="post" action="{{ route('admin.reviewsAdmin.destroy', $row->id) }}">
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
