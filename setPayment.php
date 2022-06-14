<?php
session_start();
include_once("db_conn.php");
$acc = $_POST["acc"];
$ifsc = $_POST["ifsc"];
$sid = $_SESSION["id"];

$qry = "update service set bank_acc=$acc, ifsc_code='$ifsc' where id=$sid;";

mysqli_query($conn,$qry);

header("location:sdash.php");
?>