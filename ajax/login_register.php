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




if (isset($_POST['login'])) {
    session_start(); // This session is necessary
    $data = filteration($_POST);

    // Check if user exists
    $query = "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1";
    $u_exist = select($query, [$data['email_mob'], $data['email_mob']], "ss");

    if (mysqli_num_rows($u_exist) == 0) {
        echo 'inv_email_mob';  // User not found
        exit;
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);
    error_log("Fetched User Data: " . print_r($u_fetch, true)); // Debug log

    if ($u_fetch['status'] == 0) {
        echo 'inactive';  // Account suspended
        exit;
    }

    if (!password_verify($data['pass'], $u_fetch['password'])) {
        echo 'invalid password';  // Incorrect password
        exit;
    } else {
        $_SESSION['login'] = true;
        $_SESSION['uId'] = $u_fetch['id'];
        $_SESSION['uName'] = $u_fetch['name'];
        $_SESSION['uPic'] = isset($u_fetch['profile']) ? $u_fetch['profile'] : 'default.jpg'; // Set a default if empty
        $_SESSION['uPhone'] = $u_fetch['phonenum'];

        error_log("Session Set: " . print_r($_SESSION, true)); // Log session data
        echo '1';  // Success
    }
}

?>
