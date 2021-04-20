<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_mk!=null){


    $id_mk             = $data->id_mk;
    $kode_mk           = $data->kode_mk;
    $nama_mk           = $data->nama_mk;
    $sks               = $data->sks;


    $sql = $conn->prepare("UPDATE matakuliah SET kode_mk=?, nama_mk=?, sks=? WHERE id_mk=?");

    // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum

    $sql->bind_param('ssdd', $kode_mk, $nama_mk, $sks, $id_mk);
    $sql->execute();
    if($sql){

        echo json_encode(array('RESPONSE' => 'UPDATING MATAKULIAH SUCCESS'));
    }else{

        echo json_encode(array('RESPONSE' => 'UPDATING MATAKULIAH FAILED'));
    }
}else{
    echo "GAGAL";
}

?>