<?php
require_once "Unirest.php";
class otp_verif_fun
{
    //This Is Base Url
<<<<<<< HEAD
    public $base_url = "http://172.16.86.114:8080/api/";
=======
    public $base_url = "http://192.168.1.4:8080/api/";
>>>>>>> 8e397d9efa1601dfdff478f432a2474838015dec


    function request_otp($uid,$adhaar){
        $header = array("Accept"=>'application/json');
        $url = $this->base_url."request_otp?adhaar=".utf8_encode($adhaar)."&uid=".utf8_encode($uid);
        $resp = Unirest\Request::get($url);
        return $resp;
    }
    function verify_otp($uid,$otp){
        $header = array("Accept"=>'application/json');
        $url = $this->base_url."verify_otp?uid=".utf8_encode($uid)."&otp=".utf8_encode($otp);
        $resp = Unirest\Request::get($url);
        return $resp;
    }
}