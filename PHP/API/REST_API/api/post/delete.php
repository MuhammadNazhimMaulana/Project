<?php 

// Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instansi Dataabse
$database = new Database();
$db = $database->connect();

// Instansiasi blog post object 
$post = new Post($db);


// Dapatkan Data yang mentah
$data = json_decode(file_get_contents("php://input"));

// Set ID
$post->id = $data->id;


// delete POST
if($post->delete()){
    echo json_encode(
        array('message' => 'Post Hapus')
    );
} else{
    echo json_encode(
        array('message' => 'Post Tidak Hapus')
    );
}

?>