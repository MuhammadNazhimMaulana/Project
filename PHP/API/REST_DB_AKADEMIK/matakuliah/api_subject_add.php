<?php 
require_once('../config/db.php');

$data = json_decode(file_get_contents("php://input"));


if ($data->kode_mk != null){

    $myArray = array();

    $kode_mk            = $data->kode_mk;
    $nama_mk            = $data->nama_mk;
    $sks                = $data->sks;

    if($result = mysqli_query($conn, "SELECT kode_mk, nama_mk FROM matakuliah WHERE kode_mk = '$kode_mk' OR nama_mk = '$nama_mk'")){
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $myArray[] =  $row;
        }

        if($myArray != null){
    
            echo json_encode(array('RESPONSE' => 'INSERTING MATAKULIAH FAILED, PLEASE INSERT A UNIQUE KODE_MK'));
        }else{
            $sql = $conn->prepare("INSERT INTO matakuliah(kode_mk, nama_mk, sks) VALUES ( ?, ?, ?)");
      
            // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum
      
            $sql->bind_param('ssd', $kode_mk, $nama_mk, $sks);
            $sql->execute();
            if($sql){
      
                echo json_encode(array('RESPONSE' => 'INSERTING MATAKULIAH SUCCESS'));
            }else{
      
                echo json_encode(array('RESPONSE' => 'INSERTING MATAKULIAH FAILED'));
            }
        }
    }
    

}else{
    echo "GAGAL";
}

?>