<?php 

require_once('../config/db.php');

$myArray = array();
if(isset($_GET['id'])){
    $id =  $_GET['id'];
}

if($result = mysqli_query($conn, "SELECT 
						a.id_perkuliahan,
						a.id_mhs,
						c.nama_mhs as mahasiswa,
						a.id_mk,
						e.nama_mk as matakuliah,
						a.id_dosen,
						d.nama_dosen as dosen
						FROM
						perkuliahan a 
						LEFT JOIN
						mahasiswa c ON a.id_mhs = c.id_mhs
						LEFT JOIN
						matakuliah e ON a.id_mk = e.id_mk
						LEFT JOIN
						dosen d ON a.id_dosen = d.id_dosen
						WHERE a.id_perkuliahan = $id")){

						while ($row = $result->fetch_array(MYSQLI_ASSOC)){
							$myArray[] =  $row;
						}
						if($myArray==null){

							echo json_encode(array('RESPONSE' => 'NO COLLAGE DATA'));
						}else{

							mysqli_close($conn);
							echo json_encode($myArray);
						}
					}


?>