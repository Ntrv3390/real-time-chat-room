<?php
require('connection.inc.php');

if(!isset($_SESSION['USER_LOGIN']))
{
    header('location:login.php');
}else {
    header('location:chat.php');
}

?>