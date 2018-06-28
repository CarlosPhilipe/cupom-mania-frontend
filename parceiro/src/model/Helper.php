<?php

require(__dir__."/../environment.php");

class Helper {
  public static function sendPostRequest($path = null, $data = null) {
    $url = BASE_URL."/".$path;

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json",
            'method'  => 'POST',
            'content' => $data
        )
    );
    $context  = stream_context_create($options);
    // print_r($url);
    return file_get_contents($url, false, $context);
  }

  public static function  sendGetRequest($path = null) {
    $url = BASE_URL."/".$path;
    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/json',
        )
    );

    $context = stream_context_create($opts);

    $json = file_get_contents($url, false, $context);
    return json_decode($json, TRUE);
  }
}
?>
