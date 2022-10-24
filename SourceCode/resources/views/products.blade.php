@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="text-center">All Products</h1>
    <div class="fluid-container">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($products as $item)
                <div class="col">
                    <div class="card h-100">
                        <img width="50px" height="320px" src="{{ asset('images/' .  $item->image)  }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product_name }}</h5>
                            <p class="card-text text-center"><b>${{ $item->price }}</b></p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
