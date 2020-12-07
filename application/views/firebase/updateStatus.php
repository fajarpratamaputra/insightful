<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://insightful-official.firebaseio.com/tes/1234.json",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PATCH",
  CURLOPT_POSTFIELDS =>"{\n  \"nickname\": \"fajar\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: text/plain"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;