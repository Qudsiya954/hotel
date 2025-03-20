<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HB Website-Profile</title>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">

    <?php
    require('inc/header.php');

    // Redirect if the user is not logged in
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('index.php');
    }

    // Fix SQL query by removing single quotes around id
    $u_exist = select("SELECT * FROM `user_cred` WHERE id=? LIMIT 1", [$_SESSION['uId']], 's');

    if (!$u_exist || mysqli_num_rows($u_exist) == 0) {
        redirect('index.php');
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);
    ?>


    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">Profile</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">Profile</a>
                </div>
            </div>
            <div class="col-12 my-5 px-4">
                <div class="bg-white p-3 rounded p-md-4 shadow-sm">
                    <form id="info-form">
                        <h5 class="mb-3 fw-bold">Basic Information</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="<?php echo $u_fetch['name']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" name="phonenum" value="<?php echo $u_fetch['phonenum']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="dob" value="<?php echo $u_fetch['dob']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="number" name="pincode" value="<?php echo $u_fetch['pincode']; ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-8 mb-4">
                                <label class="form-label">Address</label>

                                <textarea class="form-control" name="address" required rows="1"><?php echo $u_fetch['address']; ?></textarea>
                            </div>

                        </div>
                        <button class="btn custom-bg shadow-none text-white" type="submit">Save Changes</button>
                    </form>

                </div>
            </div>
            <div class="col-4 my-5 px-4">
                <div class="bg-white p-3 rounded p-md-4 shadow-sm">
                    <form id="profile-form">
                        <h5 class="mb-3 fw-bold">Picture</h5>
                        <img src="<?php echo USER_IMG_PATH . $u_fetch['profile']; ?>" class="img-fluid">
                        <label class="form-label"> New Picture</label>
                        <input type="file" name="profile" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                        <br>
                        <button class="btn custom-bg shadow-none text-white" type="submit">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>
    <script>
        let info_form = document.getElementById('info-form')
        info_form.addEventListener('submit', function(e) {
            e.preventDefault()
            let data = new FormData
            data.append('info-form', '')
            data.append('name', info_form.elements['name'].value)
            data.append('phonenum', info_form.elements['phonenum'].value)
            data.append('dob', info_form.elements['dob'].value)
            data.append('address', info_form.elements['address'].value)
            data.append('pincode', info_form.elements['pincode'].value)


            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/profile.php', true);

            xhr.onload = function() {
                if (this.responseText == 'phone_already') {
                    alert('error', 'Phone number already exists')
                } else if (this.responseText == 0) {
                    alert('error', 'Failed to update profile')
                } else {
                    alert('success', 'Profile updated successfully')
                }


            };
            xhr.send(data)
        })

        let profile_form = document.getElementById('profile-form')
        profile_form.addEventListener('submit', function(e) {
            e.preventDefault()
            let data = new FormData
            data.append('profile-form', '')
            data.append('profile', profile_form.elements['profile'].flies[0])


            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/profile.php', true);

            xhr.onload = function() {
                if (this.responseText === 'inv_image') {
                    alert('error', "Only jpeg, jpg, webp images allowed")
                } else if (this.responseText === 'upd_failed') {
                    alert('error', "Failed to upload image")
                } else if (this.responseText == 0) {
                    alert('error', 'No Updation Made')
                } else {
                    window.location.href = window.location.pathname;
                }


            };
            xhr.send(data)
        })
    </script>

</body>

</html>