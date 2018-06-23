<?php

require(__dir__."/../environment.php");

class Helper {
  public static function sendPostRequest($postdata){
    $postdata = http_build_query(
        array(
            'var1' => 'some content',
            'var2' => 'doh'
        )
    );

    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $postdata
        )
    );

    $context = stream_context_create($opts);

    return file_get_contents('http://example.com/submit.php', false, $context);
  }

  public static function  sendGetRequest($path = null) {
    $opts = array('http' =>
        array(
            'method'  => 'GET',
            'header'  => 'Content-type: application/json',
        )
    );

    $context = stream_context_create($opts);

    $json = file_get_contents(BASE_URL."/".KEY."/".$path, false, $context);
    return json_decode($json, TRUE);
  }
}
?>
