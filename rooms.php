<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php');  ?>


    <title>Tj Website-Rooms</title>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-2">
        <h2 class="fw-bold h-font text-center">Rooms</h2>

        <div class="h-line bg-dark"></div>

    </div>

    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filter</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropdown">
                            <div class="border bg-light rounded mb-3 p-3">
                                <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                                <label for="email" style="font-weight: 500;">Check-In</label>
                                <input type="date"  class="form-control shadow-none mt-2">
                                <label style="font-weight: 500;" class="mt-2">Check-Out</label>
                                <input type="date"  class="form-control shadow-none mt-2">
                            </div>

                            <div class="border bg-light rounded mb-3 p-3">
                                <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label for="f1" class="form-check-label">Facility one</label>

                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label for="f2" class="form-check-label">Facility two</label>

                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label for="f3" class="form-check-label">Facility three</label>

                                </div>
                            </div>
                            <div class="border bg-light rounded mb-3 p-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none" />
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 shadow border-0">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Simple Room Name</h5>
                            <div class="features mb-3 mt-2">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    3 Sofa
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1 mt-2">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>
                            <div class="guest">
                                <h6 class="mb-1 mt-2">Guest</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    3 Children
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-4 mt-lg-0 mt-md-0">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm custom-bg shadow-none text-white mb-2 w-100">Book Now</a>
                            <a href="#" class="btn btn-sm  shadow-none btn-outline-dark w-100">More Details</a>

                        </div>
                    </div>
                </div>
                <div class="card mb-4 shadow border-0">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Simple Room Name</h5>
                            <div class="features mb-3 mt-2">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    3 Sofa
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1 mt-2">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>
                            <div class="guest">
                                <h6 class="mb-1 mt-2">Guest</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    3 Children
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-4 mt-lg-0 mt-md-0">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm custom-bg shadow-none text-white mb-2 w-100">Book Now</a>
                            <a href="#" class="btn btn-sm  shadow-none btn-outline-dark w-100">More Details</a>

                        </div>
                    </div>
                </div>
                <div class="card mb-4 shadow border-0">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/rooms/1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-1">Simple Room Name</h5>
                            <div class="features mb-3 mt-2">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    2 Rooms
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    1 Bathroom
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    1 Balcony
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    3 Sofa
                                </span>
                            </div>
                            <div class="facilities mb-3">
                                <h6 class="mb-1 mt-2">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Wifi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Television
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    Room Heater
                                </span>
                            </div>
                            <div class="guest">
                                <h6 class="mb-1 mt-2">Guest</h6>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                    3 Children
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-4 mt-lg-0 mt-md-0
                        ">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm custom-bg shadow-none text-white mb-2 w-100">Book Now</a>
                            <a href="#" class="btn btn-sm  shadow-none btn-outline-dark w-100">More Details</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require('inc/footer.php'); ?>


</body>

</html>