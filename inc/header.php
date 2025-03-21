<?php









?>





<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand h-font me-5 fw-bold fs-3" href="index.php">TJ HOTEL</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About US</a>
                </li>


            </ul>
            <div class="d-flex">
                <?php
               
               if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                   $path = USER_IMG_PATH;
               
                   if (!isset($_SESSION['uPic']) || empty($_SESSION['uPic'])) {
                       echo "Session picture is not set!";
                   } else {
                       echo <<<data
                       <div class="btn-group">
                           <button type="button" class="btn btn-outline-dark shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                               <img src="{$path}{$_SESSION['uPic']}" style="width: 25px; height: 25px;" class="me-1 rounded-circle">
                               {$_SESSION['uName']}
                           </button>
                           <ul class="dropdown-menu dropdown-menu-lg-end">
                               <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                               <li><a class="dropdown-item" href="booking.php">Bookings</a></li>
                               <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                           </ul>
                       </div>
                       data;
                   }
               } else {
                   echo <<<data
                   <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                       Log in
                   </button>
                   <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                       Register
                   </button>
                   data;
               }
               ?>
                
               
                



               
            </div>
        </div>
    </div>
</nav>

<!-- Login page -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="login-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email / Mobile</label>
                        <input type="text" required name="email_mob" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="pass" required class="form-control shadow-none">
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <button class="btn btn-dark shadow-none">LOGIN</button>
                        <a href="javascript:void(0)" class="text-decoration-none text-secondary">Forgot Password</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- register page -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill"></i> User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                        Note: Your details must match with your ID (Aadhar card, passport, driving liscense etc)
                        that will be requird during check-in.
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phonenum" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Picture</label>
                                <input type="file" name="profile" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label">Address</label>

                                <textarea class="form-control" name="address" required rows="1"></textarea>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" name="pincode" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpass" class="form-control shadow-none" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-dark shadow-none my-">Register</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>