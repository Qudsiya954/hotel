<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
    $frm_data = filteration($_GET);

    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE `user_query` SET `seen`= ?";
        $values = [1];
        if (update($q, $values, "i")) {
            alert('success', "Marked all as Readed");
        } else {
            alert('error', "Failed to mark as Readed");
        }
    } else {
        $q = "UPDATE `user_query` SET `seen`= ? WHERE sr_no=?";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, "ii")) {
            alert('success', "Marked as Readed");
        } else {
            alert('error', "Failed to mark as Readed");
        }
    }
}

if (isset($_GET['del'])) {
    $frm_data = filteration($_GET);

    if (isset($frm_data['del']) && $frm_data['del'] == 'all') {
        $q = "DELETE  FROM `user_query`";



        if (mysqli_query($con, $q)) {
            alert('success', "All Data Deleted");
            header("Location: user_query.php"); // Redirect to remove 'del' from URL
            exit;
        } else {
            alert('success', "Data deleted");
        }
    } else {
        $q = "DELETE FROM `user_query` WHERE `sr_no`=?";
        $values = [$frm_data['del']];

        $result = delete($q, $values, "i");

        if ($result) {
            alert('success', "Data Deleted");
            header("Location: user_query.php"); // Redirect to remove 'del' from URL
            exit;
        } else {
            alert('success', "Data deleted");
        }
    }
}







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

                <!-- carousel settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body ">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Feature</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>

                        </div>


                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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

    <!-- Management settings Modal -->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="team-s-form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Team Member</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Name</label>
                            <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Picture</label>
                            <input type="file" name="member_picture" id="member_picture_inp" accept="[.jpg,.png, .webp, .jpeg]" class="form-control shadow-none" required>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" onclick="member_name.value='', member_picture.value = ''" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    <?php require('inc/scripts.php'); ?>


    <script src="scripts/carousel.js"></script>
</body>

</html>