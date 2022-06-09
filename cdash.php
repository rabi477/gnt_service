<?php 
session_start();

if (!isset($_SESSION["utype"]) || $_SESSION["utype"] != "customer") {
    header("location:index.php");
}

include_once("header.php");
include_once("cnav.php");


?>

<!-- Create Jobs -->
<div class="modal fade" id="crtJobs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <form class="modal-content" method="POST" action="crtJob.php">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Work Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="jobCat">
                        <option selected disabled>Select Job Category</option>
                        <option value="Painter">Painter</option>
                        <option value="Electrician">Electrician</option>
                        <option value="Carpenter">Carpenter</option>
                        <option value="Gardener">Gardener</option>
                        <option value="Plumber">Plumber</option>
                        <option value="Electronic repair">Electronic repair</option>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- chat list  -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5>Client</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="overflow-auto">
            <table class="table table-hover">
                <tbody>
                    <?php

                    include_once("db_conn.php");
                    $cid = $_SESSION['id'];
                    $qry = "select DISTINCT(user.id),name,pfpic from user,chat WHERE user.id=chat.sid and cid=$cid order by time desc;";

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

<div class="container">
    <div class="row justify-content-evenly">
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
            <img src='$pfpic' class='card-img-top w-50 h-50 rounded-circle mx-auto mt-3 d-block' alt='avatar'>
            <hr>
            <div class='card-body'>
            <h5 class='card-title'>$snm</h5>
            <p class='card-text'>$stp</p>
            <a href='#' class='btn btn-primary mx-auto cmbtn' data-bs-toggle='offcanvas' onclick='loadMsg($sid,"$snm")' data-bs-target='#cmsg' aria-controls='offcanvasRight' > Message </a>
            </div>
            </div>
            idfr;

            echo $str;
        }

        ?>
    </div>
</div>

<script>
    var sid2, snm2;
    var msgwin = document.getElementById('msg');
    var ldmsgintvrl;

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
</script>



<?php include_once("footer.php") ?>