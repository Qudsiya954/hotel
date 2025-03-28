<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();



if (isset($_POST['add_feature'])) {

    $frm_data = filteration($_POST);

    $q = "INSERT INTO `features`(`name`) VALUES (?)";
    $values = [$frm_data['name']];

    $res = insert($q, $values, "s");
    echo $res;
}


if (isset($_POST['get_features'])) {
    $res = selectAll('features');
    $i = 1;

    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<DATA
        <tr>
         <td>$i</td>
         <td>$row[name]</td>
         <td>
         <button type="button" onclick="rem_feature($row[sr_no])" class="btn btn-sm btn-danger shadow-none">Delete</button>
         </td>
        </tr>
        DATA;
        $i++;
    }
}

if (isset($_POST['rem_feature'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_feature']];
    $q = "DELETE FROM `features` WHERE `sr_no`=?";
    $res = delete($q, $values, 'i');
    echo $res; // Echo 1 for success, 0 for failure
}

if (isset($_POST['add_facility'])) {
    $frm_data = filteration($_POST);
    $member_name = $frm_data['name'];
    $img_r = uploadSvgImage($_FILES['icon'], FACILITIES_FOLDER);
    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `facilities`(`name`, `icon`, `description`) VALUES (?,?,?)";
        $values = [$frm_data['name'], $img_r, $frm_data['desc']];
        $res = insert($q, $values, "sss");
        echo $res;
    }
}

if (isset($_POST['get_facility'])) {
    $res = selectAll('facilities');
    $i = 1;
    $path = FACILITIES_IMG_PATH;

    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<DATA
        <tr class="align-middle">
         <td>$i</td>
          <td><img src="$path$row[icon]" width="100px" ></td>
         <td>$row[name]</td>
          <td>$row[description]</td>
         <td>
         <button type="button" onclick="rem_facility($row[id])" class="btn btn-sm btn-danger shadow-none">Delete</button>
         </td>
        </tr>
        DATA;
        $i++;
    }
}

if (isset($_POST['rem_facility'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_facility']];
    $pre_q = "SELECT * FROM `facilities` WHERE `id`=?";
    $res = select($pre_q, $values, 'i');

    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['icon'], FACILITIES_FOLDER)) {
       
        $q = "DELETE FROM `facilities` WHERE `id`=?";
        $res = delete($q, $values, 'i');
        echo $res; // Echo 1 for success, 0 for failure
    } else {
        echo "Error deleting image";
    }

  
}
