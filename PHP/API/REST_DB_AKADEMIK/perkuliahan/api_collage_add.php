<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->id_mhs != null){


    $id_mhs                   = $data->id_mhs;
    $id_mk                    = $data->id_mk;
    $id_dosen                 = $data->id_dosen;
    $nilai                    = $data->nilai;

    if($id_mk == null){
        
        echo json_encode(array('ERROR' => 'ID_MK TIDAK BOLEH KOSONG'));
    }elseif($id_dosen == null){

        echo json_encode(array('ERROR' => 'ID_DOSEN TIDAK BOLEH KOSONG'));
    }else{
        
            $sql = $conn->prepare("INSERT INTO perkuliahan(id_mhs, id_mk, id_dosen, nilai) VALUES ( ?, ?, ?, ?)");
        
            // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum
        
            $sql->bind_param('iiis', $id_mhs, $id_mk, $id_dosen, $nilai);
            $sql->execute();
            if($sql){
        
                echo json_encode(array('RESPONSE' => 'INSERTING COLLAGE SUCCESS'));
            }else{
        
                echo json_encode(array('RESPONSE' => 'INSERTING COLLAGE FAILED'));
            }
        }
}else{
    echo "GAGAL";
}

?>