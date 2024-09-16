<?php
session_start();
require_once "../model/db.php";
$db=new Db('users');
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(!($email && $password)) {
        $_SESSION['error'] = 'Email & Password are required !';
        header(header: 'Location:../view/login.php'); 
        exit();
    }
    
    $res=$db->getfirst('email', $email);
    if($res){
        if(password_verify($password, $res['password'])) {
            $res['password']="";
            setcookie('users',  json_encode($res), time() + (24 * 60 * 60),"/");
            $_SESSION['success'] = 'Login successfully!';
            header('location: ../view/');
           exit();
        } else {
            $_SESSION['error'] = 'Invalid Password!';
            header(header: 'Location:../view/login.php');
            exit();
        }
    }
}