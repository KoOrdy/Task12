<?php
require_once "../model/db.php";
session_start();
$db=new Db('notes');
$id=$_GET["id"];
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
    if($db->update($data,$id)){
        $_SESSION['success']='updated successfully';
        header('Location:../view/index.php');
        exit();
    }

}