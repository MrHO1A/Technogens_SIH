<?php
try{
    session_start();
    session_destroy();
}
catch (Exception $e){
    echo "lolz";
}
?>