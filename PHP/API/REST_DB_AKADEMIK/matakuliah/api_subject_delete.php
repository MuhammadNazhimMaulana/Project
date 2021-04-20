<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_mk!=null){

    $id_mk = $data->id_mk;

    $sql = $conn->prepare("DELETE FROM matakuliah WHERE id_mk=?");

    // Pada bind parameter ssd = type data yang dikirim s berarti string dan d berarti double i berarti integer

    $sql->bind_param('i', $id_mk);
    $sql->execute();
    if($sql){

        echo json_encode(array('RESPONSE' => 'DELETING SUCCESS'));
    }else{

        echo json_encode(array('RESPONSE' => 'DELETING FAILED'));
    }
}else{
    echo "GAGAL";
}

?>