<html>
    <form action="" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name">
    </div> <br>
    <div class="mb-3">
        <label for="job" class="form-label">Pekerjaan</label>
        <input type="text" class="form-control" id="job" name="job">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

<?php

if (isset($_POST['submit']))
{
    $url = "https://reqres.in/api/users";
    
    $data_array = array(    
        'name' => $_POST['name'],
        'job' => $_POST['job']
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

        echo $decoded['name'].'<br>';
        echo $decoded['job']. '<br>';
        echo $decoded['id']. '<br>' ;
    }
    
}

    ?>
</html>