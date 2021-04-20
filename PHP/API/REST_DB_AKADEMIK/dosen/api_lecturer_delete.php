<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_dosen!=null){

    $id_dosen = $data->id_dosen;

    $sql = $conn->prepare("DELETE FROM dosen WHERE id_dosen=?");

    // Pada bind parameter ssd = type data yang dikirim s berarti string dan d berarti double i berarti integer

    $sql->bind_param('i', $id_dosen);
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