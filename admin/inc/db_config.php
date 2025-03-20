<?php 
$hname = 'localhost';
$uname = 'root';
$pass = '';  // Password should be before the database name
$db = 'hbwebsite';
$port = 3307;

$con = mysqli_connect($hname, $uname, $pass, $db, $port);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function filteration($data) {
    foreach($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value =  strip_tags($value);
        $value = htmlspecialchars($data[$key]);
       $data[$key] = $value;
        

    }
    return $data;
}

function selectAll($table) 
{
  $con = $GLOBALS['con'];
  $res = mysqli_query($con,"SELECT * FROM $table");
  return $res;
}

function select($sql, $values,$datatypes) {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes,...$values);
        if(mysqli_stmt_execute($stmt)) {
           $res=  mysqli_stmt_get_result($stmt);
           mysqli_stmt_close($stmt);
           return $res;
        } else {
            mysqli_stmt_close($stmt);
            die ("Query cannot be executed-Select");
        }
       
    } else {
        die("Query cannot be execeuted - Select");
    }
}
function update($sql, $values,$datatypes) {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con, $sql)) {

        mysqli_stmt_bind_param($stmt, $datatypes,...$values);
        if(mysqli_stmt_execute($stmt)) {
           $res=  mysqli_stmt_affected_rows($stmt);
           mysqli_stmt_close($stmt);
           return $res;
        } else {
            mysqli_stmt_close($stmt);
            die ("Query cannot be executed - Update");
        }
       
    } else {
        die("Query cannot be execeuted - Update");
    }
}


function insert($sql, $values, $datatypes) {
    $con = $GLOBALS['con'];
    
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            return true; // Return true to indicate success
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Insert");
        }
    } else {
        die("Query cannot be executed - Insert");
    }
}

function delete($sql, $values,$datatypes) {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes,...$values);
        if(mysqli_stmt_execute($stmt)) {
           $res=  mysqli_stmt_get_result($stmt);
           mysqli_stmt_close($stmt);
           return $res;
        } else {
            mysqli_stmt_close($stmt);
            die ("Query cannot be executed-Delete");
        }
       
    } else {
        die("Query cannot be execeuted - Delete");
    }
}






?>
