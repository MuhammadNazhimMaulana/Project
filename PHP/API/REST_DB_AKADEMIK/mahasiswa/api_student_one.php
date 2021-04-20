<?php 

require_once('../config/db.php');

$myArray = array();
if(isset($_GET['id'])){
    $id =  $_GET['id'];
}

if($result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mhs = $id")){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $myArray[] =  $row;
    }
    if($myArray==null){

        echo json_encode(array('RESPONSE' => 'NO STUDENT DATA'));
    }else{

        mysqli_close($conn);
        echo json_encode($myArray);
    }
}


?>