<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->nip != null){

    $myArray = array();

    $nip                   = $data->nip;
    $nama_dosen            = $data->nama_dosen;
    $alamat                = $data->alamat;
    $email                 = $data->email;

    if($result = mysqli_query($conn, "SELECT * FROM dosen WHERE nip = '$nip'")){
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
            $myArray[] =  $row;
        }

        if($myArray != null){
    
            echo json_encode(array('RESPONSE' => 'INSERTING LECTURER FAILED, PLEASE INSERT A UNIQUE NIP'));
        }else{

            $sql = $conn->prepare("INSERT INTO dosen(nip, nama_dosen, alamat, email) VALUES ( ?, ?, ?, ?)");

            // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum

            $sql->bind_param('ssss', $nip, $nama_dosen, $alamat, $email);
            $sql->execute();
            if($sql){

                echo json_encode(array('RESPONSE' => 'INSERTING DOSEN SUCCESS'));
            }else{

                echo json_encode(array('RESPONSE' => 'INSERTING DOSEN FAILED'));
            }
        }
    }
}else{
    echo "GAGAL";
}

?>