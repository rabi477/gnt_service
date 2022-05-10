<?php

include_once("db_conn.php");

$sid = $_GET['sid'];
$cid = $_GET['cid'];
$msg = $_GET['msgText'];

$qry1 = "insert into chat values($cid,$sid,'$msg',current_timestamp);";

$conn->query($qry1);


?>