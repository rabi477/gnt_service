<?php
include_once('db_conn.php');

$jid = $_GET['jid'];
$sid = $_GET['sid'];

$aqry = "update job set sid=$sid where job_id=$jid";

mysqli_query($conn, $aqry);

?>