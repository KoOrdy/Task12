<?php 


setcookie('users', '', time() - (24 * 60 * 60),"/");


header('location: ../view/login.php');

