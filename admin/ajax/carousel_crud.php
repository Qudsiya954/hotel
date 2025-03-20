<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();




if (isset($_POST['add_image'])) {
   
    $member_name = $frm_data['name'];
    $img_r = uploadImage($_FILES['picture'], CAROUSEL_FOLDER);
    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = " INSERT INTO `carousel`( `image`) VALUES (?)";
        $values = [ $img_r];
        $res = insert($q, $values, "s");
        echo $res;
    }
}

if (isset($_POST['get_carousel'])) {
    $res = selectAll('carousel');


    while ($row = mysqli_fetch_assoc($res)) {
        $path = CAROUSEL_IMG_PATH;
        echo <<<DATA
        <div class="col-md-4 mb-3" id="member-$row[sr_no]">
            <div class="card bg-dark text-white">
                <img src="$path$row[image]" class="card-img"
                    style="width: 100%; height: 220px; object-fit: cover; border-radius: 10px;">
                <div class="card-img-overlay text-end">
                    <button type="button" onclick="rem_image($row[sr_no])" class="btn btn-sm btn-danger shadow-none">Delete</button>
                </div>
            </div>
        </div>
        DATA;
        
    }
    
}

if (isset($_POST['rem_image'])) 
{
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_image']];

    $pre_q = "SELECT * FROM `carousel` WHERE `sr_no`=?";
    $res = select($pre_q, $values, 'i');

    $img = mysqli_fetch_assoc($res);

    if(deleteImage($img['image'], CAROUSEL_FOLDER)) {
        $q = "DELETE FROM `carousel` WHERE `sr_no`=?";
        $res = delete($q,$values, 'i' );
        echo $res;
    } else {
        echo "Error deleting image";
    }
}





