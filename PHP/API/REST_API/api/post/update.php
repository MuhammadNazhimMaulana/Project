<?php 

// Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
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

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

// Update POST
if($post->update()){
    echo json_encode(
        array('message' => 'Post Diupdate')
    );
} else{
    echo json_encode(
        array('message' => 'Post Tidak Diupdate')
    );
}

?>