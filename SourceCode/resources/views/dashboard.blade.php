@extends('layouts.app')
@extends('layouts.nav')
@section('content')

    <head>

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            body {
                background: #eee;
            }

            .card-box {
                position: relative;
                color: #fff;
                padding: 20px 10px 40px;
                margin: 20px 0px;
            }

            .card-box:hover {
                text-decoration: none;
                color: #f1f1f1;
            }

            .card-box:hover .icon i {
                font-size: 100px;
                transition: 1s;
                -webkit-transition: 1s;
            }

            .card-box .inner {
                padding: 5px 10px 0 10px;
            }

            .card-box h3 {
                font-size: 27px;
                font-weight: bold;
                margin: 0 0 8px 0;
                white-space: nowrap;
                padding: 0;
                text-align: left;
            }

            .card-box p {
                font-size: 15px;
            }

            .card-box .icon {
                position: absolute;
                top: auto;
                bottom: 5px;
                right: 5px;
                z-index: 0;
                font-size: 72px;
                color: rgba(0, 0, 0, 0.15);
            }

            .card-box .card-box-footer {
                position: absolute;
                left: 0px;
                bottom: 0px;
                text-align: center;
                padding: 3px 0;
                color: rgba(255, 255, 255, 0.8);
                background: rgba(0, 0, 0, 0.1);
                width: 100%;
                text-decoration: none;
            }

            .card-box:hover .card-box-footer {
                background: rgba(0, 0, 0, 0.3);
            }


            .bg-blue {
                background: linear-gradient(45deg, #4099ff, #73b4ff);
            }

            .bg-green {
                background: linear-gradient(45deg, #2ed8b6, #59e0c5);
            }

            .bg-orange {
                background: linear-gradient(45deg, #FFB64D, #ffcb80);
            }

            .bg-red {
                background: linear-gradient(45deg, #FF5370, #ff869a);
            }

            .bg-red2 {
                background: linear-gradient(45deg, #0a0a0a, #202020d6);
            }

            .bg-red3 {
                background: linear-gradient(45deg, #9812c9, #6d484e);
            }
        </style>


    </head>
   

    <div class="container">
        <div class="row justify-content">




            <div class="container">
                <div class="row">


                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-blue">
                            <div class="inner">
                                <h3> ( {{ $allUsers }} ) </h3>
                                <p> Number Of Users </p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <a href="users" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>






                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> ( {{ $allCategory }} ) </h3>
                                <p> Number Of Categories </p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-columns-gap"></i>
                            </div>
                            <a href="{{ route('admin.categories.index') }}" class="card-box-footer">View More <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>








                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-orange">
                            <div class="inner">
                                <h3> ( {{ $allRooms }} ) </h3>
                                <p> Number Of Rooms </p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-hospital"></i>
                            </div>
                            <a href="{{ route('admin.roomsAdmin.index') }}" class="card-box-footer">View More <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>





                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-red">
                            <div class="inner">
                                <h3> ( {{ $allReservations }} ) </h3>
                                <p> Number Of Reservations </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-credit-card f-left"></i>
                            </div>
                            <a href="{{ route('admin.booking.index') }}" class="card-box-footer">View More <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>






                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-red2">
                            <div class="inner">
                                <h3> ( {{ $allreview }} ) </h3>
                                <p> Number Of Reviews </p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-chat"></i>
                            </div>
                            <a href="{{ route('admin.reviewsAdmin.index') }}" class="card-box-footer">View More <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-red3">
                            <div class="inner">
                                <h3> ( {{ $allmessages }} ) </h3>
                                <p> Number Of Messages </p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-envelope-open-fill"></i>
                            </div>
                            <a href="{{ route('admin.contactAdmin.index') }}" class="card-box-footer">View More <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>




























                </div>
            </div>





































        </div>










    </div>
@endsection
