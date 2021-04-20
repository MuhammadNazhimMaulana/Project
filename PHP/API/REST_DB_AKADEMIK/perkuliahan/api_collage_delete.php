<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_perkuliahan!=null){

    $id_perkuliahan = $data->id_perkuliahan;

    $sql = $conn->prepare("DELETE FROM perkuliahan WHERE id_perkuliahan=?");

    // Pada bind parameter ssd = type data yang dikirim s berarti string dan d berarti double i berarti integer

    $sql->bind_param('i', $id_perkuliahan);
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