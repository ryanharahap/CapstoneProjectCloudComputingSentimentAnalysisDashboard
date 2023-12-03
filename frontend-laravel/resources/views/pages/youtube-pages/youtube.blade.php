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

    <!-- Search Start -->
    <div class="search-bar">
        <div class="font">
            <label for="basic-url" class="form-label">Your youtube link !</label>
        </div>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon3">hhttps://www.youtube.com/watch?v=</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
        </div>
        <br>
        <a href="/Youtube" class="btn btn-primary">Submit</a>
    </div>
    <!-- Search End -->

    <!-- Analysis Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Details Analysis</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Sentiment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>12-01-2023</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi sint nobis quos
                                        dolorem iste sit, commodi optio aperiam, expedita laborum exercitationem
                                        quibusdam impedit distinctio quas voluptatem accusamus ratione iusto qui?</td>
                                    <td>Positif</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>12-02-2023</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi sint nobis quos
                                        dolorem iste sit, commodi optio aperiam, expedita laborum exercitationem
                                        quibusdam impedit distinctio quas voluptatem accusamus ratione iusto qui?</td>
                                    <td>Positif</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>12-09-2023</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi sint nobis quos
                                        dolorem iste sit, commodi optio aperiam, expedita laborum exercitationem
                                        quibusdam impedit distinctio quas voluptatem accusamus ratione iusto qui?</td>
                                    <td>Negatif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-3">
                <div class="col">
                    <div class="bg-light rounded h-80 p-4">
                        <h6 class="mb-4">Doughnut Chart</h6>
                        <canvas id="doughnut-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Analysis End -->
</div>

<!-- Content End -->