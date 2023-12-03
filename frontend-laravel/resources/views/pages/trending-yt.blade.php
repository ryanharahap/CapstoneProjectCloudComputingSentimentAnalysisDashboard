@extends('layout.navbar')
<!-- Content Start -->
<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="/
            " class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">John Doe</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="/login" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Analysis Start -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Trending Youtube in Indonesia</h2>

        <div class="row">
            @foreach ($videos['items'] as $video)
            <div class="col-md-4 g-4">
                <div class="card video-card h-100">
                    <div class="embed-responsive">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video['id'] }}"
                            allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $video['snippet']['title'] }}</h5>
                        <p class="card-text">
                            {{ $video['snippet']['description'] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
    <!-- Analysis End -->
</div>

<!-- Content End -->