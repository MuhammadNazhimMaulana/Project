<?php 

// API Untuk Covid

     $url = file_get_contents('https://covidapi.info/api/v1/global');
     $data = json_decode($url, true);
    // // var_dump($data);

     $url_idn = file_get_contents('https://covidapi.info/api/v1/country/IND/latest');
     $data_idn = json_decode($url_idn, true);
    // // var_dump($data_idn);
    
    $url_h = file_get_contents('https://dekontaminasi.com/api/id/covid19/hospitals');
    $data_h = json_decode($url_h, true);
    // var_dump($data_h);

    $url_b = file_get_contents('https://jsonplaceholder.typicode.com/posts');
    $data_b = json_decode($url_b, true);
    // var_dump($data_h);

    $url_g = file_get_contents('https://dekontaminasi.com/api/id/covid19/hoaxes');
    $data_g = json_decode($url_g, true);
    // var_dump($data_h);

    $url_l = file_get_contents('https://covidapi.info/api/v1/global/latest');
    $data_l = json_decode($url_l, true);
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
        $decode = json_decode($resp, true);
        // print_r($decoded);
    }

    curl_close($ch);


// API Untuk bagian news

$link = file_get_contents("https://newsapi.org/v2/everything?q=apple&from=2021-03-24&to=2021-03-24&sortBy=popularity&apiKey=1f30eb091e8545cd80abd46adb7be761");
$news = json_decode($link);

// API Untuk news space
$link = file_get_contents("https://test.spaceflightnewsapi.net/api/v2/articles");
$news_s = json_decode($link);



?>