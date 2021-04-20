<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_mhs!=null){


    $id_mhs             = $data->id_mhs;
    $npm                = $data->npm;
    $nama_mhs           = $data->nama_mhs;
    $tgl_lahir          = $data->tgl_lahir;
    $alamat             = $data->alamat;
    $jns_kelamin        = $data->jns_kelamin;

    $sql = $conn->prepare("UPDATE mahasiswa SET npm=?, nama_mhs=?, tgl_lahir=?, alamat=?, jns_kelamin=? WHERE id_mhs=?");

    // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum

    $sql->bind_param('ssssdd', $npm, $nama_mhs, $tgl_lahir, $alamat, $jns_kelamin, $id_mhs);
    $sql->execute();
    if($sql){

        echo json_encode(array('RESPONSE' => 'UPDATING MAHASISWA SUCCESS'));
    }else{

        echo json_encode(array('RESPONSE' => 'UPDATING MAHASISWA FAILED'));
    }
}else{
    echo "GAGAL";
}

?>