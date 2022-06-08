<?php

$cid = $_GET['cid'];
$sid = $_GET['sid'];
$jid = $_GET['jid'];

include_once("db_conn.php");

$qry  = "select job_tle,job_desp,job.address from job where job_id=$jid;";

$res = mysqli_query($conn, $qry);

while($val = $res->fetch_assoc()){
$tle = $val['job_tle'];
$desp = $val['job_desp'];
$addr = $val['address'];

$str=<<<idfr
<div>
    <div class="mb-3">
        <label class="form-label">Job Title</label>
        <input type="text" class="form-control" value="$tle" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Job Description</label>
        <textarea class="form-control" rows="4" disabled>$desp</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Customer Address</label>
        <textarea class="form-control" rows="4" disabled>$addr</textarea>
    </div>
</div>
idfr;

echo $str;

}

?>