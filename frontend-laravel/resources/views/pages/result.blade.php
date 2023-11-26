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
                    <a href="#" class="dropdown-item">My Profile</a>
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="/Login" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Search Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Input Keyword</label>
                        <input type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <a href="/Result" class="btn btn-primary">Submit</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- Filter Dropdown Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="card">
            <div class="card-header">
                <div class="filterx">
                    <div class="filter-menu pt-2 px-4 row">
                        <div class="btn-group col-md-3 mb-2">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button"
                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                Jangka Waktu
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                        <div class="btn-group col-md-3 mb-2 ">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button"
                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                Negara
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                        <div class="btn-group col-md-3 mb-2 ">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button"
                                data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                Usia
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                        <div class="btn-group col-md-3 mb-2">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                Jenis Kelamin
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Menu item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter Dropdown End -->

    <!-- Source Sentiment Analysis Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="/Result" href="/Result">Youtube</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Result">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Result">Playstore</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="col-sm-12 col">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Popularity</h6>
                        <canvas id="worldwide-sales"></canvas>
                    </div>
                </div>
                <br>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Single Bar Chart</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Lates Comment</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Comment</th>
                                        <th scope="col">Sentiment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>jhon@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>mark@email.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>jacob@email.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Source Sentiment Analysis END -->
</div>
<!-- Content End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>