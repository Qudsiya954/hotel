<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard-Feature & Facilities</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Feature & Facilities</h3>

                <!-- feature settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body ">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Feature</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>

                        </div>


                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-white">
                                        <th scope="col">SR_No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                    <?php
                                    $q = "SELECT * FROM `user_query` ORDER BY 'sr_no' DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen .= "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as Read</a><br> ";
                                        }

                                        $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                                        echo <<<query
                                    <tr>
                                    <td>$i</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                       <td>$row[subject]</td>
                                       <td>$row[message]</td>
                                       <td>$row[date]</td>
                                       <td>$seen</td>
                                    </tr>
                                    query;
                                        $i++;
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- facility settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body ">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>

                        </div>


                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead >
                                    <tr class="bg-dark text-white">
                                        <th scope="col">SR_No</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">
                                    <?php
                                    $q = "SELECT * FROM `user_query` ORDER BY 'sr_no' DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;

                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $seen = '';
                                        if ($row['seen'] != 1) {
                                            $seen .= "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as Read</a><br> ";
                                        }

                                        $seen .= "<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                                        echo <<<query
                                    <tr>
                                    <td>$i</td>
                                    <td>$row[name]</td>
                                    <td>$row[email]</td>
                                       <td>$row[subject]</td>
                                       <td>$row[message]</td>
                                       <td>$row[date]</td>
                                       <td>$seen</td>
                                    </tr>
                                    query;
                                        $i++;
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    <!-- Feature  Modal -->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="feature-s-form" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- facility modal -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="facility-s-form" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Facilities</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon</label>
                            <input type="file" accept=".svg" name="facility_icon" class="form-control shadow-none" required>
                        </div>
                        <div class=" mb-3">
                            <label class="form-label">Description</label>

                            <textarea class="form-control" name="facility_desc" required rows="1"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <?php require('inc/scripts.php'); ?>


    <script src="scripts/features_facilities.js"></script>
   
</body>

</html>