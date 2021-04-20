<?php 
require_once('../config/db.php');
$data = json_decode(file_get_contents("php://input"));


if ($data->npm != null){

    $myArray = array();

    $npm                   = $data->npm;
    $nama_mhs              = $data->nama_mhs;
    $tgl_lahir             = $data->tgl_lahir;
    $alamat                = $data->alamat;
    $jns_kelamin           = $data->jns_kelamin;

        if($result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE npm = '$npm'")){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $myArray[] =  $row;
            }

            if($myArray != null){
        
                echo json_encode(array('RESPONSE' => 'INSERTING STUDENT FAILED, PLEASE INSERT A UNIQUE NPM'));
            }else{

        $sql = $conn->prepare("INSERT INTO mahasiswa(npm, nama_mhs, tgl_lahir, alamat, jns_kelamin) VALUES (?, ?, ?, ?, ?)");

        // Pada bind parameter ssdse = type data yang dikirim s berarti string dan d berarti date dan e berarti enum

        $sql->bind_param('ssssd', $npm, $nama_mhs, $tgl_lahir, $alamat, $jns_kelamin);
        $sql->execute();
        if($sql){

            echo json_encode(array('RESPONSE' => 'INSERTING STUDENT SUCCESS'));
        }else{

            echo json_encode(array('RESPONSE' => 'INSERTING STUDENT FAILED'));
        }

        }
    }

}else{
    echo "GAGAL";
}


?>
