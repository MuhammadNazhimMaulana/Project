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

// Blofpost query
$result  =$post->read();

// Get perhitungan row
$num = $result->rowCount();

// Cek ada post atau tidak
if($num > 0){
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        // Push ke 'Data'
        array_push($posts_arr['data'], $post_item);
    }


    // Jadikan json
    echo json_encode($posts_arr);

}else {
    // Tidak ada Post
    echo json_encode(
        array('message' => 'Tidak ada Postingan ditemukan')
    );

}

?>