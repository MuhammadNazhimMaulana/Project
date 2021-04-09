<html>
    <form action="" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Nama</label>
        <input type="text" class="form-control" id="title" name="title">
    </div> <br>
    <div class="mb-3">
        <label for="body" class="form-label">Pekerjaan</label>
        <input type="text" class="form-control" id="body" name="body">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php

if (isset($_POST['submit']))
{
    $url = "https://jsonplaceholder.typicode.com/posts";
    
    $data_array = array(    
        'title' => $_POST['title'],
        'body' => $_POST['body']
    );
    
    $data = http_build_query($data_array);
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $resp = curl_exec($ch);
    
    if($e = curl_error($ch)){
        echo $e;
    }
    else{
        $decoded = json_decode($resp, true);
        print_r($decoded);

        echo $decoded['title'].'<br>';
        echo $decoded['body']. '<br>';
        echo $decoded['id']. '<br>' ;
    }
    
}

    ?>
</html>
