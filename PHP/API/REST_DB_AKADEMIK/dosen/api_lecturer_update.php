<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_dosen!=null){


    $id_dosen             = $data->id_dosen;
    $nip                  = $data->nip;
    $nama_dosen           = $data->nama_dosen;
    $alamat               = $data->alamat;
    $email                = $data->email;


    $sql = $conn->prepare("UPDATE dosen SET nip=?, nama_dosen=?, alamat=?, email=? WHERE id_dosen=?");

    // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum

    $sql->bind_param('ssssd', $nip, $nama_dosen, $alamat, $email, $id_dosen);
    $sql->execute();
    if($sql){

        echo json_encode(array('RESPONSE' => 'UPDATING DOSEN SUCCESS'));
    }else{

        echo json_encode(array('RESPONSE' => 'UPDATING DOSEN FAILED'));
    }
}else{
    echo "GAGAL";
}

?>