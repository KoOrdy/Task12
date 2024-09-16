<?php
session_start();
require_once "../model/db.php";
$db=new Db('notes');
$id=$_GET['id'];

if($db->delete($id)){

    $_SESSION['success']='deleted successfully';
    header("location: ../view/index.php");
}