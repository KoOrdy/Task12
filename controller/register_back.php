<?php
session_start();
ob_start();
require_once "../model/db.php";
$db = new Db("users");
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data=[
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];
    if($db->insert($data)){
        unset($data['password']);
        setcookie('users',  json_encode($data), time() + (24 * 60 * 60),"/");
        $_SESSION['success'] = 'registered successfully';
        header('location:../view/index.php');
        exit(); 
    }
    
    
}