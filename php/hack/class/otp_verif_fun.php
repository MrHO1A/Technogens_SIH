<?php
require_once "Unirest.php";
class otp_verif_fun
{
    //This Is Base Url
    public $base_url = "http://192.168.1.4:8080/api/";


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
    function final_ver($uid,$otp){
        $header = array("Accept"=>'application/json');
        $url = $this->base_url."otp_validate?uid=".utf8_encode($uid)."&otp=".utf8_encode($otp);
        $resp = Unirest\Request::get($url);
        return $resp;
    }
    function get_documents($uid){
        //Old Method
        $url = $this->base_url."get_doc_info?uid=".utf8_encode($uid)."&data=".utf8_encode("tenth,twelth,domicile");
        $resp = Unirest\Request::get($url);
        return $resp;
    }
    function get_document_list($uid){
        $url = $this->base_url."get_doc_list?uid=".utf8_encode($uid);
        $resp = Unirest\Request::get($url);
        $resp = explode(',',$resp->raw_body);
        return $resp;
    }
    function verify_documents($data_of,$file_names,$uid){
        //Making CSV values
        $data_of_csv = implode(',',$data_of);
        $file_names_csv = implode(',',$file_names);
        //End

        //Final Call Url
        $url = $this->base_url."doc_verf_status?uid=".utf8_encode($uid)."&files=".utf8_encode($file_names_csv)."&data=".utf8_encode($data_of_csv);
        $resp = Unirest\Request::get($url);
        return $resp;
    }
}