<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');


if (isset($_POST['register'])) {
    $data = filteration($_POST);

    // matching passwords
    if ($data['pass'] != $data['cpass']) {
        echo 'Mismatched Password';
        exit;
    }

    // check user exist
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['phonenum']], "ss");
    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'Email_already' : 'Phone_already';
        exit;
    }

    // Upload user image to the server
    $img = uploadUserImage($_FILES['profile']);
    if ($img == 'inv_img') {
        echo 'Invalid Image';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'Upload Failed';
        exit;
    }

    // Encrypt password
    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    // Insert user into database
    $query = "INSERT INTO `user_cred` (`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`) 
              VALUES (?,?,?,?,?,?,?,?)";

    $values = [
        $data['name'],
        $data['email'],
        $data['address'],
        $data['phonenum'],
        $data['pincode'],
        $data['dob'],
        $img,
        $enc_pass
    ];

    if (insert($query, $values, "ssssssss")) {
        alert('success', "Registration Completed");
    } else {
        echo 0;
    }
}




if (isset($_POST['profile-form'])) {
    session_start();
    
    if (!isset($_SESSION['uId'])) {
        echo 'session_error';
        exit;
    }

    $img = uploadUserImage($_FILES['profile']);
    if ($img == 'inv_img') {
        echo 'Invalid Image';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'Upload Failed';
        exit;
    }

    // Check if user exists before fetching data
    $u_exist = select("SELECT `profile` FROM `user_cred` WHERE `id`=?", [$_SESSION['uId']], "s");

    if (!$u_exist) {
        echo 'user_not_found';
        exit;
    }

    if (mysqli_num_rows($u_exist) != 0) {
        $u_fetch = mysqli_fetch_assoc($u_exist);
        deleteImage($u_fetch['profile'], USER_FOLDER);
    }

    $query = "UPDATE `user_cred` SET `profile`=? WHERE `id`=?";
    $values = [$img, $_SESSION['uId']];

    if (update($query, $values, "ss")) {
        $_SESSION['uPic'] = $img;
        echo 'success';
    } else {
        echo 'error';
    }
}


?>
