<?php 

// Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instansi Dataabse
$database = new Database();
$db = $database->connect();

// Instansiasi blog post object 
$post = new Post($db);

// Mendapatkan ID dari url
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get POST
$post->read_single();

// Membuat array
$post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name'=> $post->category_name
);

// Membuat json
print_r(json_encode($post_arr));


?>