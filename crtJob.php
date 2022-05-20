<?php

session_start();
$cid = $_SESSION['id'];
extract($_POST);

include_once("db_conn.php");

$qry = "insert into job values($cid,'$jobCat','$jobTle','$jobDesp');";

if(mysqli_query($conn, $qry)){
    header("locaton:cdash.php");
}else{
    header("locaton:cdash.php");
}


?>