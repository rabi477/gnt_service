<?php session_start(); ?>

<?php

if (!isset($_SESSION["utype"]) || $_SESSION["utype"] != "service provider") {
  header("location:index.php");
}

include_once("header.php");
include_once("snav.php");

?>

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
          $sid = $_SESSION['id'];
          $qry = "select DISTINCT(user.id),name,pfpic from user,chat WHERE user.id=chat.cid and sid=$sid order by time desc;";

          $res = $conn->query($qry);

          while ($val = $res->fetch_assoc()) {
            $cnm = $val['name'];
            $cid = $val['id'];
            $pfpic = $val['pfpic'];

            $str = <<<idfr
            <tr style="cursor:pointer;" class="cmbtn" data-bs-toggle="offcanvas" data-bs-target="#clientChatBox" aria-controls="offcanvasRight" onclick='loadMsg($cid,"$cnm")' >
            <td class="w-25" ><img src="$pfpic" alt="avatar" height="50px" width="50px" style="border-radius:50%"></td>
            <td class="fw-bold w-75 pt-4">$cnm</td>
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

<!-- client chat box -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="clientChatBox" aria-labelledby="offcanvasRightLabel">
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

<!-- Modal service type -->
<div class="modal fade" id="sTypeDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hi, <?php echo $_SESSION['name']; ?> </h5>
      </div>
      <form method="post">
        <div class="modal-body">
          <label for="stype" class="form-label">Please select what service you want to provide ? </label>
          <select class="form-select" aria-label="Default select example" name="stype" id="stlist" onclick="pbtnact()">
            <option selected disabled>Select Service Type</option>
            <option value="Painter">Painter</option>
            <option value="Electrician">Electrician</option>
            <option value="Carpenter">Carpenter</option>
            <option value="Gardener">Gardener</option>
            <option value="Plumber">Plumber</option>
            <option value="Electronic repair">Electronic repair</option>
            <option value="House cleaner">House cleaner</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" name="pbtn" class="btn btn-primary mx-auto" id="prcdbtn" disabled>Proceed</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Work Details card -->
<div class="container">
  <div class="row justify-content-evenly">
    <?php
    include_once("db_conn.php");
    $sid = $_SESSION['id'];
    $ctqry = "select job_id,job.cid,name,pfpic from user,job,service where job_cat=(select s_type where service.id=$sid) and job.cid=user.id;";

    $res = mysqli_query($conn, $ctqry);
    while ($val2 = $res->fetch_assoc()) {
      $cnm2 = $val2['name'];
      $cid2 = $val2['cid'];
      $pfpic = $val2['pfpic'];
      $jid = $val2['job_id'];

      $str2=<<<ccard
        <div class="card text-center border-3 rounded-3 m-2" style="width: 18rem;">
        <img src="$pfpic" class="card-img-top rounded-circle w-50 h-50 mx-auto d-block mt-3 " alt="avatar">
        <hr>
        <div class="card-body">
          <h5 class="card-title">$cnm2</h5>
          <a href="#" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#viewDetails" onclick="vDetails($cid2,'$cnm2',$jid)" >View Details</a>
        </div>
        </div>
      ccard;

      echo $str2;
    }

    ?>
  </div>
</div>


<!-- View Details -->
<div class="modal fade" id="viewDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="vJobDetail">
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="offcanvas" data-bs-target="#clientChatBox" aria-controls="offcanvasRight" id="vBtn" >Message</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" >Accept</button>
      </div>
    </div>
  </div>
</div>


<script>
  function pbtnact() {
    let l = document.getElementById('stlist');
    if (l.selectedIndex > 0) {
      document.getElementById('prcdbtn').disabled = false;
    }
  }

  var cid2, cnm2;
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
    xhttp.open("GET", "setmsg.php?cid=" + cid2 + "&sid=<?php echo $_SESSION['id']; ?>&msgText=" + msgText + "&dirtn=stc", true);
    xhttp.send();
  }

  function loadMsg(cid, cnm) {
    cid2 = cid;
    cnm2 = cnm;
    document.getElementById('offcanvasRightLabel').innerText = cnm;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("msg").innerHTML = this.responseText;
        msgwin.scrollTop = msgwin.scrollHeight;
      }
    };
    xhttp.open("GET", "getmsg.php?cid=" + cid + "&sid=<?php echo $_SESSION['id']; ?>" + "&dirtn=stc", true);
    xhttp.send();
  }

  function vDetails(cid,cnm,jid){
    document.getElementById('vTitle').innerText=cnm;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("vJobDetail").innerHTML = this.responseText;
        document.getElementById('vBtn').setAttribute('onclick','loadMsg('+cid+',\"'+cnm+'\")');
      }
    };
    xhttp.open("GET", "getJobDetail.php?cid="+cid+"&jid="+jid+"&sid=<?php echo $_SESSION['id'];?>", true);
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
    ldmsgintvrl = setInterval(loadMsg, 1000, cid2, cnm2);
  });


  function loagImg(event) {
    var image = document.getElementById('prfimg');
    image.src = URL.createObjectURL(event.target.files[0]);
  }
</script>


<?php

extract($_POST);
include_once("db_conn.php");
$sid = $_SESSION['id'];

if (isset($pbtn)) {
  $qry1 = "insert into service values($sid, '$stype');";
  $conn->query($qry1);
}

$qry2 = "select * from service where id=$sid;";

$sres = $conn->query($qry2);

if ($sres->num_rows == 0) {
  echo "<script>
        window.onload = function(){
        var myModal = new bootstrap.Modal(document.getElementById('sTypeDetail'), {});
        myModal.toggle();
        }
        </script>";
}

?>




<?php include_once("footer.php") ?>