<?php 

require_once('../config/db.php');

$myArray = array();
if($result = mysqli_query($conn, "SELECT * FROM dosen ORDER BY id_dosen ASC")){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $myArray[] =  $row;
    }
    mysqli_close($conn);
    echo json_encode($myArray);
}


?>