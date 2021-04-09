<?php 

// Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// Instansi Dataabse
$database = new Database();
$db = $database->connect();

// Instansiasi blog category object 
$category = new Category($db);

// Category (baca) query
$result  =$category->read();

// Get perhitungan row
$num = $result->rowCount();

// Cek ada kategori atau tidak
if($num > 0){
    $cat_arr = array();
    $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $cat_item = array(
            'id' => $id,
            'name' => $name
        );

        // Push ke 'Data'
        array_push($cat_arr['data'], $cat_item);
    }


    // Jadikan json
    echo json_encode($cat_arr);

}else {
    // Tidak ada Post
    echo json_encode(
        array('message' => 'Tidak ada kategori ditemukan')
    );

}

?>