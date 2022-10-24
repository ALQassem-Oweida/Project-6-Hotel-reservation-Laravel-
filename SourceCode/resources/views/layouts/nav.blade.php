<nav class="navbar navbar-expand-lg bg-light " style="background-color: #e3f2fd;">
    <div class="container-fluid ">
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav fw-bolder">
                <a class="nav-link  " aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="nav-link" href="users">Users</a>
                <a class="nav-link" href="{{ route('admin.categories.index') }}">Categories</a>
                <a class="nav-link" href="{{ route('admin.roomsAdmin.index') }}">Rooms</a>
                <a class="nav-link" href="{{ route('admin.booking.index') }}">Reservations</a>
                <a class="nav-link" href="{{ route('admin.reviewsAdmin.index') }}">Reviews</a>
                <a class="nav-link" href="{{ route('admin.contactAdmin.index') }}">Messages</a>
            
                
            </div>
        </div>
    </div>
</nav>
