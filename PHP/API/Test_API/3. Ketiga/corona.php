<?php 
    $url = file_get_contents('https://api.kawalcorona.com/positif');
    $data = json_decode($url, true);
    // var_dump($data);

    $url_s = file_get_contents('https://api.kawalcorona.com/sembuh');
    $data_s = json_decode($url_s, true);
    // var_dump($data);
    
    $url_h = file_get_contents('https://dekontaminasi.com/api/id/covid19/hospitals');
    $data_h = json_decode($url_h, true);
    // var_dump($data_h);

// Percobaan cURL

    $ch = curl_init();

    $url = "https://reqres.in/api/users?page=2";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);

    if($e = curl_error($ch)){
        echo $e;
    }
    else{
        $decoded = json_decode($resp, true);
    }

    curl_close($ch);

?>