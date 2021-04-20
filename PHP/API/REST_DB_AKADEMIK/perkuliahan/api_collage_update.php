<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_perkuliahan!=null){


    $id_perkuliahan             = $data->id_perkuliahan;
    $id_mhs                     = $data->id_mhs;
    $id_mk                      = $data->id_mk;
    $id_dosen                   = $data->id_dosen;
    $nilai                      = $data->nilai;


    $sql = $conn->prepare("UPDATE perkuliahan SET id_mhs=?, id_mk=?, id_dosen=?, nilai=? WHERE id_perkuliahan=?");

    // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum

    $sql->bind_param('iiisi', $id_mhs, $id_mk, $id_dosen, $nilai, $id_perkuliahan);
    $sql->execute();
    if($sql){

        echo json_encode(array('RESPONSE' => 'UPDATING COLLAGE SUCCESS'));
    }else{

        echo json_encode(array('RESPONSE' => 'UPDATING COLLAGE FAILED'));
    }
}else{
    echo "GAGAL";
}

?>