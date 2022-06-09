<?php

session_start();
$cid = $_SESSION['id'];
extract($_POST);

include_once("db_conn.php");

$qry = "insert into job(cid,job_cat,job_tle,job_desp,address) values($cid,'$jobCat','$jobTle','$jobDesp','$address');";

mysqli_query($conn, $qry);
    
header("location:cdash.php");



?>