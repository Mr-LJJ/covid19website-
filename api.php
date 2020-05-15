<?php
    header('Content-Type: application/json; charset=UTF-8');
    $host = "https://ncovdata.market.alicloudapi.com";
    $path = "/ncov/cityDiseaseInfoWithTrend";
    $method = "GET";
    $appcode = "a91fc22f40374b3387de1cd511b6e5bb";//此appcode为LJJ Studios所有请勿挪用
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "";
    $bodys = "";
    $url = $host . $path;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, true);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $a = curl_exec($curl);
    $Virus_api = strchr($a,'{"country"');
?>
