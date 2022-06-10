<?php

include_once("db_conn.php");

$jid = $_GET['jid'];
$cqry = "update job set sid=0 where job_id=$jid;";

mysqli_query($conn, $cqry);

?>