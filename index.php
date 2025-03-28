<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php');  ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <title>Tj Website-Home</title>
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 0px 25px;
                padding: 0 35px;
            }

        }
    </style>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>


    <!-- carousel -->
    <div class="container-fluid lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                $res = selectAll('carousel');
                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<DATA
                       <div class="swiper-slide">
                    <img src="$path$row[image]" class="w-100 d-block" />
                </div>
        DATA;
                }

                ?>


               
            </div>

        </div>

    </div>
    <!-- check availability form -->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white p-4 shadow rounded">
                <h5 class="mb-4">Check Booking availability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label for="email" class="form-label" style="font-weight: 500;">Check-In</label>
                            <input type="date" id="email" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="email" class="form-label" style="font-weight: 500;">Check-Out</label>
                            <input type="date" id="email" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="email" class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label for="email" class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- our rooms -->
    <h2 class="mt-5 pt-5 fw-bold h-font text-center">
        OUR ROOMS
    </h2>
    <div class="conatiner">
        <div class="row">

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/rooms/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Simple Room Name</h5>
                        <h6 class="mb-4">$200 per night</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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
                        <div class="guest mb-4">
                            <h6 class="mb-1 mt-2">Guest</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                3 Children
                            </span>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm custom-bg shadow-none text-white">Book Now</a>
                            <a href="#" class="btn btn-sm  shadow-none btn-outline-dark">More Details</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/rooms/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Simple Room Name</h5>
                        <h6 class="mb-4">$200 per night</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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
                        <div class="guest mb-4">
                            <h6 class="mb-1 mt-2">Guest</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                3 Children
                            </span>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm custom-bg shadow-none text-white">Book Now</a>
                            <a href="#" class="btn btn-sm  shadow-none btn-outline-dark">More Details</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/rooms/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>Simple Room Name</h5>
                        <h6 class="mb-4">$200 per night</h6>
                        <div class="features mb-4">
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
                        <div class="facilities mb-4">
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
                        <div class="guest mb-4">
                            <h6 class="mb-1 mt-2">Guest</h6>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                5 Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark  text-wrap lh-base">
                                3 Children
                            </span>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm custom-bg shadow-none text-white">Book Now</a>
                            <a href="#" class="btn btn-sm  shadow-none btn-outline-dark">More Details</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center mt-5">
                <a href="" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">More Rooms >>></a>
            </div>
        </div>
    </div>

    <!-- facilities -->
    <h2 class="mt-5 pt-5 fw-bold h-font text-center">
        OUR FACILITIES
    </h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-3">
            <div class="col-lg-2 .col-md-2 text-center shadow bg-white rounded py-4 my-3">
                <img src="images/features/IMG_43553.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 .col-md-2 text-center shadow bg-white rounded py-4 my-3">
                <img src="images/features/IMG_43553.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 .col-md-2 text-center shadow bg-white rounded py-4 my-3">
                <img src="images/features/IMG_43553.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 .col-md-2 text-center shadow bg-white rounded py-4 my-3">
                <img src="images/features/IMG_43553.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 .col-md-2 text-center shadow bg-white rounded py-4 my-3">
                <img src="images/features/IMG_43553.svg" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">

                <a href="" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">More Facilities >>></a>

            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <h2 class="mt-5 pt-5 fw-bold h-font text-center">
        TESTIMONIALS
    </h2>
    <div class="conatiner mt-5">
        <div class="swiper swiper-testimonials ">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="images/features/IMG_27079.svg" width="30px">
                        <h6 class="m-0 ms-2">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Deleniti dolor minima blanditiis porro officia consequatur
                        iusto delectus beatae maiores laboriosam.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="images/features/IMG_27079.svg" width="30px">
                        <h6 class="m-0 ms-2">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Deleniti dolor minima blanditiis porro officia consequatur
                        iusto delectus beatae maiores laboriosam.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="images/features/IMG_27079.svg" width="30px">
                        <h6 class="m-0 ms-2">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Deleniti dolor minima blanditiis porro officia consequatur
                        iusto delectus beatae maiores laboriosam.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="images/features/IMG_27079.svg" width="30px">
                        <h6 class="m-0 ms-2">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Deleniti dolor minima blanditiis porro officia consequatur
                        iusto delectus beatae maiores laboriosam.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">

            <a href="" class="btn btn-sm btn-outline-dark  rounded-0 fw-bold shadow-none">Know More >>></a>

        </div>


    </div>

    <!-- reach us -->




    <h2 class="mt-5 pt-5 fw-bold h-font text-center">
        REACH US
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 bg-white rounded mb-lg-0">
                <iframe class="w-100 rounded"
                    src="<?php echo $contact_r['iframe']; ?>"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 mb-4 rounded">
                    <h5>Call Us</h5>
                    <a href="+<?php echo $contact_r['pn1']; ?>" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1']; ?>
                    </a>
                    <br>
                    <?php
                    if ($contact_r['pn2'] != '') {
                        $pn2 = $contact_r['pn2']; // Store value in variable
                        echo <<<DATA
                            <a href="tel:+$pn2" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> +$pn2
                            </a>
                        DATA;
                    }

                    ?>

                </div>
                <div class="bg-white p-4 mb-4 rounded">
                    <h5>Follow Us</h5>
                    <a href="<?php echo $contact_r['tw']; ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="<?php echo $contact_r['insta']; ?>" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        // Change slide when clicking on an image
        document.querySelectorAll(".swiper-slide img").forEach((img, index) => {
            img.addEventListener("click", () => {
                swiper.slideNext(); // Moves to the next slide on click
            });
        });
        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            slidesPerView: "3",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                480: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    </script>
</body>

</html>