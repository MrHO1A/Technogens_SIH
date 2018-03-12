<?php
require_once 'class/otp_verif_fun.php';
/**
 * Created by PhpStorm.
 * User: AMAN
 * Date: 3/11/2018
 * Time: 12:23 PM
 */
header("Access-Control-Allow-Origin: *");
$otp = $_GET['otp'];
session_start();
$obj_c = new otp_verif_fun();
$retval = $obj_c->verify_otp($_SESSION['uid'],$otp);
echo $retval->raw_body;
?>