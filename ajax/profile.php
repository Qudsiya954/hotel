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
    $img = uploadUserImage($_FILES['profile']);
    if ($img == 'inv_img') {
        echo 'Invalid Image';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'Upload Failed';
        exit;
    }

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
