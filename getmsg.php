<?php

include_once("db_conn.php");

$sid = $_GET['sid'];
$cid = $_GET['cid'];

$qry = "select msg from chat where sid=$sid and cid=$cid";

$res = $conn->query($qry);

while($val = $res->fetch_assoc()){
    $msg = $val['msg'];

    $str=<<<idfr
    <div>$msg</div>
    idfr;

    echo $str;
}


?>

