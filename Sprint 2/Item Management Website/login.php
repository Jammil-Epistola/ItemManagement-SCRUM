<?php

session_start();

$validUSername = 'admin';
$validPassword = 'admin';

if($_SERVER['REQUEST_METHOD'==='POST']){
        $username = $_POST['username'];
        $password = $_POST['password'];

    if($username === $validUSername && $password === $validPassword){
        $_SESSION['username'] = $username;

        header('Location: MainPage.html');
        exit();
    }else{
        echo "<script>alert('Invalid Username or Password'); window.location.href = 'LoginPage.html'; </script>";
    }
}else {
    header('Location: LoginPage.html');
    exit();
}
?>
