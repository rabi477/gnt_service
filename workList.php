<?php
    include_once("db_conn.php");
    $id = $_GET['id'];
    $wqry = "select job_id,job_tle,work_done,sid from job where cid=$id order by time desc;";
    $res = mysqli_query($conn,$wqry);
    while($val = $res->fetch_assoc()){
        $jid = $val['job_id'];
        $tle = $val['job_tle'];
        $wdone = $val['work_done'];
        $sid = $val['sid'];

        if($sid !=0 ){
            $nqry = "select name from user where id=$sid;";
            $nres = mysqli_query($conn,$nqry);
            $nval = mysqli_fetch_assoc($nres);
            $nm = $nval["name"];
        }

        $str="";

        if($sid==0 && $wdone==0){
            $str=<<<idfr
            <tr>
                <td class="fw-bold">$tle</td>
                <td class="d-flex justify-content-end">
                <button class="btn btn-primary mx-2" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#editWorkList" onclick="editWorkList($jid)">Edit</button>
                <button class="btn btn-danger" onclick="deleteWorkList($jid)" >Delete</button>
                </td>
            </tr>
            idfr;
        }else if($sid!=0 && $wdone==0){
            $str=<<<idfr
            <tr>
                <td class="fw-bold">$tle</td>
                <td class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mx-2 cmbtn" data-bs-toggle="offcanvas" data-bs-target="#cmsg" aria-controls="offcanvasRight" data-bs-dismiss="modal" onclick="loadMsg($sid,'$nm')">Message</button>
                <button class="btn btn-primary">Pay</button>
                </td>
            </tr>
            idfr;
        }else if($sid!=0 && $wdone==1){
            $str=<<<idfr
            <tr>
                <td class="fw-bold">$tle</td>
                <td class="d-flex justify-content-end">
                <button class="btn btn-outline-warning">Review and Rating</button>
                </td>
            </tr>
            idfr;
        }

        echo $str;
    }

?>