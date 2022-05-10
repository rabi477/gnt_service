<?php

include_once("db_conn.php");

$sid = $_GET['sid'];
$cid = $_GET['cid'];
$msg = $_GET['msgText'];

$qry1 = "insert into chat values($cid,$sid,'$msg',current_timestamp);";

$conn->query($qry1);

$qry2 = "select msg from chat where sid=$sid and cid=$cid";

$res = $conn->query($qry2);

while($val = $res->fetch_assoc()){
    $msg = $val['msg'];

    $str=<<<idfr
    <div>$msg</div>
    idfr;

    echo $str;
}

?>