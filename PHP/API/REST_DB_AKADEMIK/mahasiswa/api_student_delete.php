<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_mhs!=null){

    $id_mhs = $data->id_mhs;

    $sql = $conn->prepare("DELETE FROM mahasiswa WHERE id_mhs=?");

    // Pada bind parameter ssd = type data yang dikirim s berarti string dan d berarti double i berarti integer

    $sql->bind_param('i', $id_mhs);
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