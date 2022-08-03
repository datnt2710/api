<?php
$func = $_POST["func"];

switch ($func) {
    case 'checkLocationByCookie':
        $func();
        break;

    case 'getIp':
        $func();
        break;
}

function getIp()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://icanhazip.com',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Cookie: 123'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

function checkLocationByCookie()
{
    $curl = curl_init();
    $cookie = $_POST["cookie"];

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://m.facebook.com/primary_location/info',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            "Cookie: $cookie"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}
