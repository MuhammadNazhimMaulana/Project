<?php 

require_once('../config/db.php');

$myArray = array();
if($result = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id_mhs ASC")){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $myArray[] =  $row;
    }
    mysqli_close($conn);
    echo json_encode($myArray);
}


?>