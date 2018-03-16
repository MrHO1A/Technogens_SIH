<?php
session_start();
$data = $_SESSION['data'];
$data = json_decode($data);
function auth_error(){
    echo "<script>alert('False Auth Detected'); </script>";
    echo "There Is Some Sort Of Error While Processing Form..\nRedirecting you to home page....";
    echo "<h1><a href='./index'>Click To Go Back!</a></h1>";
}
if(!isset($_SESSION['data'])){
    auth_error();
}
else{?>
<?php include_once "view/form_view.php"; ?>
<?php

}
?>