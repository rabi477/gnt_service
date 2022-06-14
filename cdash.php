<?php
session_start();

if (!isset($_SESSION["utype"]) || $_SESSION["utype"] != "customer") {
    header("location:index.php");
}

include_once("header.php");
include_once("cnav.php");


?>

<!-- work buttons -->
<div class="container text-center mb-5">
    <button type="button" class="btn btn-primary btn-lg ms-3 my-2" data-bs-toggle="modal" data-bs-target="#crtJobs" onclick="crtJobFun()">
        + Work Details
    </button>
    <button type="button" class="btn btn-primary btn-lg ms-3 my-2" data-bs-toggle="modal" data-bs-target="#workList">
        Work List
    </button>
</div>

<!-- search -->
<div class="container mb-5">
    <div class="d-flex justify-content-between">
        <select class="form-select" aria-label="Default select example" id="stype">
            <option selected>Select Service Type (ALL)</option>
            <option value="Painter">Painter</option>
            <option value="Electrician">Electrician</option>
            <option value="Carpenter">Carpenter</option>
            <option value="Gardener">Gardener</option>
            <option value="Plumber">Plumber</option>
            <option value="House cleaner">House cleaner</option>
        </select>
        <button type="button" class="btn btn-primary mx-2" onclick="searchService()">Search</button>
    </div>
</div>

<!-- Create Work -->
<div class="modal fade" id="crtJobs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form class="modal-content" method="POST" action="crtJob.php">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Work Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="cwBody">
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="jobCat" name="jobCat" onclick="jbtnact()">
                        <option selected disabled>Select Work Category</option>
                        <option value="Painter">Painter</option>
                        <option value="Electrician">Electrician</option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Gardener">Gardener</option>
                        <option value="Plumber">Plumber</option>
                        <option value="House cleaner">House cleaner</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Work Title</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTle">
                </div>
                <div class="mb-3">
                    <label for="jobDescription" class="form-label">Work Description</label>
                    <textarea class="form-control" id="jobDescription" rows="4" name="jobDesp"></textarea>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" rows="4" name="address"><?php echo $_SESSION['address']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pincode</label>
                    <input type="text" class="form-control" name="pincode" value="<?php echo $_SESSION['pincode']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="jobBtn" disabled>Submit</button>
            </div>
        </form>
    </div>
</div>


<!-- Work List -->
<div class="modal fade" id="workList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Work List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody id="wList">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- Edit Worklist -->
<div class="modal fade" id="editWorkList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form class="modal-content" action="updateWorkList.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Worklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadWorkList">
                ...
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- chat list  -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5>Messages</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="overflow-auto">
            <table class="table table-hover">
                <tbody>
                    <?php

                    include_once("db_conn.php");
                    $cid = $_SESSION['id'];
                    $qry = "select DISTINCT(user.id),name,pfpic from user,chat WHERE user.id=chat.sid and cid=$cid order by time;";

                    $res = $conn->query($qry);

                    while ($val = $res->fetch_assoc()) {
                        $snm = $val['name'];
                        $sid = $val['id'];
                        $pfpic = $val['pfpic'];

                        $str = <<<idfr
                            <tr style="cursor:pointer;" class="cmbtn" data-bs-toggle="offcanvas" data-bs-target="#cmsg" aria-controls="offcanvasRight" onclick='loadMsg($sid,"$snm")' >
                            <td><img src="$pfpic" alt="avatar" height="50px" width="50px" style="border-radius:50%"></td>
                            <td class="fw-bold w-75 pt-4">$snm</td>
                            </tr>
                        idfr;

                        echo $str;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chat offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cmsg" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color: grey;" onclick="clmsgintvrl()">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </span>
        <h5 id="offcanvasRightLabel">Messages</h5>
        <button type="button" class="btn-close text-reset" onclick="clmsgintvrl()" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="position-relative h-100">
            <div id="msg" class="d-flex flex-column overflow-auto text-wrap" style="height:88% ;">

            </div>
            <hr>
            <div class="d-flex position-absolute bottom-0 w-100">
                <input type="text" class="form-control" id="msgval" placeholder="Type Message Here ...">
                <button type="button" onclick="sendMsg()" class="btn btn-primary mx-2 px-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- service provider card -->
<div class="container">
    <div class="row justify-content-evenly" id="usCard">
        <?php

        include_once("db_conn.php");

        $spqry = "select service.id,name,s_type,pfpic from user,service where utype='service provider' and user.id=service.id limit 6;";
        $spres = $conn->query($spqry);

        while ($val = $spres->fetch_assoc()) {
            $snm = $val['name'];
            $stp = $val['s_type'];
            $sid = $val['id'];
            $pfpic = $val['pfpic'];

            $str = <<<idfr
            <div class='card text-center border-3 rounded-3 m-2' style='width: 18rem;'>
            <img src='$pfpic' class='card-img-top w-50 h-50 mx-auto mt-3 d-block' alt='avatar' style="clip-path:circle(40%)">
            <hr>
            <div class='card-body'>
            <h5 class='card-title'>$snm</h5>
            <p class='card-text'>$stp</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vService" onclick="vProfile($sid,'$snm','$stp')"> View Profile </button>
            </div>
            </div>
            idfr;

            echo $str;
        }

        ?>
    </div>
</div>

<!-- View Service Provider Profile -->
<div class="modal fade" id="vService" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="vProf">
        
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class='btn btn-primary cmbtn' data-bs-toggle='offcanvas' data-bs-target='#cmsg' aria-controls='offcanvasRight' data-bs-dismiss="modal" id="mBtn">Message</button>
        <button type="button" class="btn btn-primary" id="bnBtn" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#crtJobs">Book Now</button>
      </div>
    </div>
  </div>
</div>


<script>
    var sid2, snm2;
    var msgwin = document.getElementById('msg');
    var ldmsgintvrl;

    function jbtnact() {
        let l = document.getElementById('jobCat');
        if (l.selectedIndex > 0) {
            document.getElementById('jobBtn').disabled = false;
        }
    }

    function sendMsg() {
        var msgText = document.getElementById('msgval').value;
        var xhttp = new XMLHttpRequest();
        document.getElementById('msgval').value = "";
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("msg").innerHTML = this.responseText;
                msgwin.scrollTop = msgwin.scrollHeight;
            }
        };
        xhttp.open("GET", "setmsg.php?cid=<?php echo $_SESSION['id']; ?>&sid=" + sid2 + "&msgText=" + msgText + "&dirtn=cts", true);
        xhttp.send();
    }

    function loadMsg(sid, snm) {
        sid2 = sid;
        snm2 = snm;
        document.getElementById('offcanvasRightLabel').innerText = snm;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("msg").innerHTML = this.responseText;
                msgwin.scrollTop = msgwin.scrollHeight;
            }
        };
        xhttp.open("GET", "getmsg.php?cid=<?php echo $_SESSION['id']; ?>&sid=" + sid + "&dirtn=cts", true);
        xhttp.send();
    }

    function vProfile(sid,snm,stp){
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vProf").innerHTML = this.responseText;
                document.getElementById("mBtn").setAttribute("onclick","loadMsg("+sid+",\'"+snm+"\')");
                document.getElementById("bnBtn").setAttribute("onclick","bookNow("+sid+",\'"+stp+"\')");
            }
        };
        xhttp.open("GET", "viewProfile.php?sid="+sid, true);
        xhttp.send();
    }

    function bookNow(sid,cat){
        document.getElementById("jobCat").value=cat;
        document.getElementById("jobCat").classList.add("visually-hidden");
        let ctn = document.getElementById("cwBody");
        if(document.getElementById("jobSid")){
            document.getElementById("jobSid").remove();
        }
        let el = document.createElement("input");
        el.setAttribute("value",sid);
        el.setAttribute("id","jobSid");
        el.classList.add("form-control");
        el.classList.add("visually-hidden");
        el.setAttribute("name","sid");
        ctn.appendChild(el);
        document.getElementById('jobBtn').disabled = false;
    }

    function crtJobFun(){
        document.getElementById('jobBtn').disabled = true;
        document.getElementById("jobCat").disabled = false;
        document.getElementById('jobCat').selectedIndex = 0;
        if(document.getElementById("jobSid")){
            document.getElementById("jobSid").remove();
        }
    }

    function workList() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("wList").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "workList.php?id=<?php echo $_SESSION['id']; ?>", true);
        xhttp.send();
    }

    setInterval(workList, 2000);

    function deleteWorkList(jid) {
        if (confirm("Are you sure you want to delete?")) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "deleteWorkList.php?jid=" + jid, true);
            xhttp.send();
        }
    }

    function editWorkList(jid) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loadWorkList").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getWorkList.php?jid=" + jid, true);
        xhttp.send();
    }


    function clmsgintvrl() {
        clearInterval(ldmsgintvrl);
    }

    document.querySelector('#msgval').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMsg();
        }
    });

    document.querySelector('.cmbtn').addEventListener('click', () => {
        ldmsgintvrl = setInterval(loadMsg, 1000, sid2, snm2);
    });

    function loagImg(event) {
        var image = document.getElementById('prfimg');
        image.src = URL.createObjectURL(event.target.files[0]);
    }

    function searchService() {
        let stype = document.getElementById("stype").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("usCard").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "csearchService.php?stype=" + stype, true);
        xhttp.send();
    }
</script>



<?php include_once("footer.php") ?>