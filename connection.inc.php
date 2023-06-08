<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "rashid");
if(!$con)
{
    echo "Error occured while connecting to database";
}
?>