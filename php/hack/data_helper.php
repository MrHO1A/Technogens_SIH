<?php
var_dump($_POST);
$ar = array('a','b','aman');
var_dump(implode(',',$ar));
echo '<br></br>';
session_start();
var_dump($_SESSION['form_data']);
?>