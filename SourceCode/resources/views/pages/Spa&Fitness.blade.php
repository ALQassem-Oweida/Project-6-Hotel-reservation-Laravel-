@extends('pages.master.master')
	@section('content')


    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Spa&Fitness</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Spa&Fitness</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/fitness-area-web.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
        
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/Fitness1.jpg" alt="Image">
              
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                       
                    
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/spa2.jpg" alt="Image">
              
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                       
                    
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/spa.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Discover A Brand Luxurious Hotel</h1>
                       
                       
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h6 class="section-title text-start text-primary text-uppercase">Spa&Fitness</h6>
                <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Black Horse Hotel  </span>"Spa&Fitness"</h1>
                <p class="mb-4">To us, true luxury is a meaningful sense of belonging. It is a dedicated focus on how people want to be treated, grounded in the genuine care you experience during your stay and defined by an abundance of humanity and generosity. This starts with our passionate team, welcoming you to be the centre of our world, anywhere in the world – and always with a distinctly human touch.</p>

        </div>
    </div>
</div>
</div>
<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
        <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-1">
                <div class="bg-white rounded text-center p-5">
                    <h4 class="mb-4">For more information please <span class="text-primary text-uppercase">Contact US</span></h4>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        
                        <button type="button" class="btn btn-primary py-2 px-3 position-center absolute top-0 end-0 mt-2 me-2">Contact US</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection