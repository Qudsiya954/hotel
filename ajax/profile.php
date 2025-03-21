<?php


require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

if (isset($_POST['info-form'])) {
    $frm_data = filteration($_POST);
    session_start();

    $u_exist = select("SELECT * FROM `user_cred` WHERE  `phonenum`=? AND `id`!=? LIMIT 1",
      [$data['phonenum'],$_SESSION['uid']], "ss");
    if (mysqli_num_rows($u_exist) != 0) {
        echo 'phone_already';
        exit;
    }
    $query = "UPDATE `user_cred` SET `name`=?,`address`=?,`phonenum`=?,`pincode`=?,`dob`=?";
    $values=[$frm_data['name'],$frm_data['address'],$frm_data['phonenum'],$frm_data['pincode'],$frm_data['dob'],$_SESSION['uId']];
    if(update($query,$values,"ssssss")) {
        $_SESSION['uName'] = $frm_data['name'];

        echo 'success';
    } else {
        echo 'error';
    }
}


if (isset($_POST['profile-form'])) {
    session_start();

    if (!isset($_SESSION['uId'])) {
        echo 'session_error';
        exit;
    }

    error_log("User ID: " . $_SESSION['uId']); // Check if session ID is set

    if (!isset($_FILES['profile']) || $_FILES['profile']['error'] !== UPLOAD_ERR_OK) {
        echo 'file_upload_error';
        exit;
    }

    // Upload image
    $img = uploadUserImage($_FILES['profile']);
    error_log("Uploaded Image: " . $img); // Log image name

    if ($img == 'inv_img') {
        echo 'Invalid Image';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'Upload Failed';
        exit;
    }

    // Check existing profile image
    $u_exist = select("SELECT `profile` FROM `user_cred` WHERE `id`=?", [$_SESSION['uId']], "s");

    if (!$u_exist || mysqli_num_rows($u_exist) == 0) {
        echo 'user_not_found';
        exit;
    }

    $u_fetch = mysqli_fetch_assoc($u_exist);
    error_log("Old Profile Image: " . $u_fetch['profile']); // Log old profile

    if (!empty($u_fetch['profile'])) {
        deleteImage($u_fetch['profile'], USER_FOLDER);
    }

    // Update new profile image in the database
    $query = "UPDATE `user_cred` SET `profile`=? WHERE `id`=?";
    $values = [$img, $_SESSION['uId']];

    if (update($query, $values, "ss")) {
        $_SESSION['uPic'] = $img;
        error_log("Profile Updated Successfully: " . $_SESSION['uPic']); // Log session update
        echo 'success';
    } else {
        echo 'db_update_error';
    }
}
