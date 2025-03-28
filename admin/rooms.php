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
    <title>Admin dashboard-Rooms</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Rooms</h3>

                <!-- feature settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body ">
                        <div class="text-end mb-3">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i> Add
                            </button>

                        </div>


                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">SR_No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guest</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>

                                        <th scope="col">Quantity</th>
                                        <th scope="col">Action</th>



                                    </tr>
                                </thead>
                                <tbody id="room-data">
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

    <!-- Add room Modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Room</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('features');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                           <div class='col-md-3'>
                                           <label>
                                            <input type='checkbox' name='features[]' value='$opt[sr_no]' class='form-check-input shadow-none'>
                                           $opt[name]
                                            </label>
                                               </div>
                                               ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('facilities');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                           <div class='col-md-3'>
                                           <label>
                                            <input type='checkbox' name='facilities[]' value='$opt[id]' class='form-check-input shadow-none'>
                                           $opt[name]
                                            </label>
                                               </div>
                                               ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="email" class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="shadow-none form-control" required></textarea>
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

    <!-- Edit room Modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" enctype="multipart/form-data" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Room</h5>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="email" class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('features');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                           <div class='col-md-3'>
                                           <label>
                                            <input type='checkbox' name='features[]' value='$opt[sr_no]' class='form-check-input shadow-none'>
                                           $opt[name]
                                            </label>
                                               </div>
                                               ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res = selectAll('facilities');
                                    while ($opt = mysqli_fetch_assoc($res)) {
                                        echo "
                                           <div class='col-md-3'>
                                           <label>
                                            <input type='checkbox' name='facilities[]' value='$opt[id]' class='form-check-input shadow-none'>
                                           $opt[name]
                                            </label>
                                               </div>
                                               ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="email" class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="shadow-none form-control" required></textarea>
                            </div>
               <input type="hidden" name="room_id">
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

    <script>
        let add_room_form = document.getElementById('add_room_form');

        add_room_form.addEventListener('submit', (e) => {
            e.preventDefault();
            add_rooms();
        });

        function add_rooms() {
            let data = new FormData(add_room_form);
            data.append('add_rooms', '1'); // ✅ Ensure it's sent properly
            data.append('name', add_room_form.elements['name'].value);
            data.append('area', add_room_form.elements['area'].value);
            data.append('price', add_room_form.elements['price'].value);
            data.append('quantity', add_room_form.elements['quantity'].value);
            data.append('adult', add_room_form.elements['adult'].value);
            data.append('children', add_room_form.elements['children'].value);
            data.append('desc', add_room_form.elements['desc'].value);

            let features = [];
            document.querySelectorAll('input[name="features[]"]:checked').forEach(el => {
                features.push(el.value);
            });

            let facilities = [];
            document.querySelectorAll('input[name="facilities[]"]:checked').forEach(el => {
                facilities.push(el.value);
            });

            data.append('features', JSON.stringify(features)); // ✅ Keep JSON format
            data.append('facilities', JSON.stringify(facilities)); // ✅ Keep JSON format

            console.log("Sending Data: ", Object.fromEntries(data.entries())); // Debugging

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/rooms.php', true);

            xhr.onload = function() {
                console.log("Server Response: ", this.responseText); // ✅ Debugging

                var myModalEl = document.getElementById('add-room');
                var modalInstance = bootstrap.Modal.getInstance(myModalEl);
                if (modalInstance) {
                    modalInstance.hide(); // ✅ Hide the modal properly
                }

                if (this.responseText.trim() == "1") {
                    alert('success', 'New Room added successfully!');
                    add_room_form.reset();
                    get_all_rooms(); // ✅ Fetch updated room list
                } else {
                    alert('error', 'Server Down. Please try again later.');
                }
            };

            xhr.send(data);
        }

        function get_all_rooms() {
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/rooms.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // ✅ Ensure correct content type

            xhr.onload = function() {
                console.log("Fetched Rooms Data: ", this.responseText); // ✅ Debugging
                document.getElementById('room-data').innerHTML = this.responseText;
            };

            xhr.send('get_all_rooms=1'); // ✅ Correctly send POST parameter
        }

        function editDetails(id) 
        {
            
        }

        function toggleStatus(id, val) {

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/rooms.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText.trim() == "1") {
                    alert('success', 'Room Status updated successfully!');
                    get_all_rooms();
                } else {
                    alert('error', 'Server Down. Please try again later.');
                }

            };
            xhr.send('toggleStatus=' + id + '&value=' + val);
        }

        window.onload = function() {
            get_all_rooms();
        }
    </script>



</body>

</html>