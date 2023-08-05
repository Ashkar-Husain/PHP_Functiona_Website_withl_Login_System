<?php
include 'config.php';
include 'header.php';
if(empty($_SESSION['userData'])){
    header('Location:http://localhost/beg_log/login.php');
    connection_close($conn);   
}
