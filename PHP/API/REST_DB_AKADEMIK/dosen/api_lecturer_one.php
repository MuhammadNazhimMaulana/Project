<?php 

require_once('../config/db.php');

$myArray = array();
if(isset($_GET['id'])){
    $id =  $_GET['id'];
}

if($result = mysqli_query($conn, "SELECT * FROM dosen WHERE id_dosen = $id")){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $myArray[] =  $row;
    }
    if($myArray==null){

        echo json_encode(array('RESPONSE' => 'NO LECTURER DATA'));
    }else{

        mysqli_close($conn);
        echo json_encode($myArray);
    }
}


?>