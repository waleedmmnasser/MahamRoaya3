<?php

class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = false)
    {
        require 'views/' . $name . '.php';    
    }

    public function gotoPage($pgName)
    {
        $pgName = URL . $pgName;
        echo "<script language=\"text/javascript\">window.location.href='" . $pgName . "';</script>";
    }

    public function doPostRequest($url, $data, $optional_headers = null)
    {
        $params = array('http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => $data
                    ));

        if ($optional_headers !== null) {
            $params['http']['header'] = $optional_headers;
        }

        $ctx = stream_context_create($params);
        $fp = @fopen(URL . $url, 'rb', false, $ctx);
        if (!$fp) {
            throw new Exception("Problem with $url, $php_errormsg");
        }

        $response = @stream_get_contents($fp);
        if ($response === false) {
            throw new Exception("Problem reading data from $url, $php_errormsg");
        }
        return $response;
    }
}