<?php

$username = $_POST['username'];
$password = $_POST['password'];


if($username !='admin'){ 
    echo'anda bukan admin';
    exit();
}

if($password !='admin'){
    echo'password salah';
    exit();
}

session_start();
$_SESSION['username']=$username;
header('Location:/login/index.php');