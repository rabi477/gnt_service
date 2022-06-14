<?php

session_start();
$cid = $_SESSION['id'];
extract($_POST);

include_once("db_conn.php");

if(isset($sid)){
    $qry = "insert into job(cid,job_cat,job_tle,job_desp,address,pincode,time,sid) values($cid,'$jobCat','$jobTle','$jobDesp','$address',$pincode,current_timestamp,$sid);";
}else{
    $qry = "insert into job(cid,job_cat,job_tle,job_desp,address,pincode,time) values($cid,'$jobCat','$jobTle','$jobDesp','$address',$pincode,current_timestamp);";
}


mysqli_query($conn, $qry);
    
header("location:cdash.php");



?>