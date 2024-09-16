<?php
session_start();
require_once "../model/db.php";
$db=new Db('notes');


if($_SERVER['REQUEST_METHOD']=='POST'){

    $title=$_POST["title"];
    $description=$_POST["description"];
    $date=$_POST["date"];
    $done=$_POST["done"];

    $data=[
        'title' => $title,
        'description' => $description,
        'date' => $date,
        'done' => $done
    ];

    if($db->insert($data)){
        $_SESSION['success']="note added successfully";
        header('Location:../view/index.php');
        exit();
    }
}


