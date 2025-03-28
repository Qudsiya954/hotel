

<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();




if (isset($_POST['add_rooms'])) {

    // Decode JSON safely
    $features = isset($_POST['features']) ? json_decode($_POST['features'], true) : [];
    $facilities = isset($_POST['facilities']) ? json_decode($_POST['facilities'], true) : [];

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Error decoding JSON: " . json_last_error_msg();
        exit();
    }

    $frm_data = filteration($_POST);
    $flag = 0;

    // Insert Room Data
    $q1 = "INSERT INTO `rooms` (`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
    $values = [
        $frm_data['name'],
        $frm_data['area'],
        $frm_data['price'],
        $frm_data['quantity'],
        $frm_data['adult'],
        $frm_data['children'],
        $frm_data['desc']
    ];

    if (insert($q1, $values, "siiiiis")) {
        $flag = 1;
        $room_id = mysqli_insert_id($con);
    } else {
        echo "SQL Error: " . mysqli_error($con);
        exit();
    }

    // Insert Facilities
    $q2 = "INSERT INTO `rooms_facilities` (`rooms_id`, `facilities_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q2)) {
        foreach ($facilities as $f) {
            mysqli_stmt_bind_param($stmt, "ii", $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Query cannot be prepared: Insert Facilities";
        exit();
    }

    // Insert Features (Fixed Query)
    $q3 = "INSERT INTO `rooms_features` (`rooms_id`, `features_id`) VALUES (?,?)";
    if ($stmt = mysqli_prepare($con, $q3)) {
        foreach ($features as $f) {
            mysqli_stmt_bind_param($stmt, "ii", $room_id, $f);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Query cannot be prepared: Insert Features";
        exit();
    }

    echo $flag ? 1 : 0;
}

// ✅ Fetch all rooms correctly
if (isset($_POST['get_all_rooms'])) {
    $res = selectAll('rooms');
    $i = 1; // ✅ Fix index starting from 1

    $data = "";
    while ($row = mysqli_fetch_assoc($res)) {
        $status = $row['status'] == 1
            ? "<button onclick='toggleStatus($row[id],0)' class='btn btn-sm btn-dark shadow-none'>Active</button>"
            : "<button onclick='toggleStatus($row[id],1)' class='btn btn-sm btn-warning shadow-none'>Inactive</button>";

        $data .= "
        <tr class='align-middle'>
            <td>$i</td>
            <td>$row[name]</td>
            <td>{$row['area']} sq ft</td>
            <td>
                <span class='badge rounded-pill bg-light text-dark'>Adult: $row[adult]</span><br>
                <span class='badge rounded-pill bg-light text-dark'>Children: $row[children]</span>
            </td>
            <td>$$row[price]</td>
            <td>$row[quantity]</td>
            <td>$status</td>
            <td>
             <button type='button' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' 
             data-bs-target='#editModal' >
    <i class='bi bi-pencil-square'></i>
</button>
            </td>
        </tr>";

        $i++;
    }
    echo $data;
}
if (isset($_POST['toggleStatus'])) {
    $frm_data = filteration($_POST);
    $q = 'UPDATE `rooms` SET `status`=? WHERE `id`=?';
    $v = [$frm_data['value'], $frm_data['toggleStatus']];

    if (update($q, $v, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}
