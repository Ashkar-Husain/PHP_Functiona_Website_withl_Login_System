<?php
include 'config.php';

session_start();

session_unset();

session_regenerate_id();
header('Location:http://localhost/beg_log/login.php');



?>