@extends('pages.master.header2')
@extends('layouts.app2')
@section('profile')
    <div class="container mt-5">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <form method="post" action="{{ route('userprofile.update', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" type="text" class="form-control"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone" type="text" class="form-control"
                                            value="{{ $user->phone }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                    </div>
                                </div>
                                <br><br>
                                <hr class="my-4">


                            </form>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">My Reservations</h5>


                                    <table class="table table-striped">
                                        <thead>


                                            <th>Room Number</th>
                                            <th>Total Amount</th>
                                            <th>Date of Booking</th>
                                            <th>Check-in Date</th>
                                            <th>Check-out Date</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservation as $row)
                                                <tr>

                                                    <td>{{ $row->room_id }}</td>
                                                    <td>{{ $row->totalAmount }} $</td>
                                                    <td>{{ $row->created_at }}</td>
                                                    <td>{{ $row->checkIn_date }}</td>
                                                    <td>{{ $row->checkOut_date }}</td>


                                                    <form class="float-end" method="post"
                                                        action="{{ route('userprofile.destroy', $row->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td><input
                                                                onclick="return confirm('Are you sure you want to delete this Reservation?')"
                                                                type="submit" class="btn btn-danger btn-sm"
                                                                value="Delete" /></td>



                                                        <td> <input type="button" class="btn btn-primary btn-sm"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                value="Add a Review">

                                                        </td>
                                                    </form>

                                                    <!-- Modal -->
                                                    <form method="post" action="{{ route('review.store', $row->id) }}">

                                                        @csrf
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            Add Your Review</h1>

                                                                        <input type="hidden" name="room_id"
                                                                            value="{{ $row->room_id }}">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>


                                                                    <textarea name="review" class="m-4" rows="3"></textarea>


                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Confirm Booking</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="card">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center">
                                {{ $message }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> <br> <br>
                                <img src="/img/testimonial-1.jpg" alt="Admin" class="rounded-circle p-1 bg-primary"
                                    width="110">
                                <div class="mt-3">
                                    <br>
                                    <h4>{{ $user->name }}</h4>
                                    <br>

                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Registration Date : </label>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-secondary mb-1">{{ $user->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>











            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ URL::asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ URL::asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ URL::asset('js/main.js') }}"></script>
@endsection
