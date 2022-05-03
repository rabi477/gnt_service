<?php session_start() ?>

<?php 
  if(!isset($_SESSION["utype"])){
          header("location:index.php");
  }

  if($_SESSION["utype"]!="service provider"){
        header("location:cdash.php");
  }
?>

<?php include_once("header.php") ?>
<?php include_once("snav.php") ?>

 
<!-- Modal -->
<div class="modal fade" id="sTypeDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hi, <?php echo $_SESSION['name']; ?> </h5>
      </div>
      <form method="post">
      <div class="modal-body">
      <label for="stype" class="form-label" >Please select what service you want to provide ? </label>
      <select class="form-select" aria-label="Default select example" name="stype" id="stlist" onclick="pbtnact()" >
        <option selected disabled>Select Service Type</option>
        <option value="Painter">Painter</option>
        <option value="Electrician">Electrician</option>
        <option value="Carpenter">Carpenter</option>
      </select>
      </div>
      <div class="modal-footer">
        <button type="submit" name="pbtn" class="btn btn-primary mx-auto" id="prcdbtn" disabled >Proceed</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  function pbtnact(){
    let l = document.getElementById('stlist');
    if(l.selectedIndex>0){
      document.getElementById('prcdbtn').disabled=false;
    }
  }
</script>

<?php

extract($_POST);
include_once("db_conn.php");
$sid = $_SESSION['id'];

if(isset($pbtn)){
  $qry1 = "insert into service values($sid, '$stype');";
  $conn->query($qry1);
}

$qry2 = "select * from service where id=$sid;";

$sres = $conn->query($qry2);

if($sres->num_rows==0){
  echo "<script>
        window.onload = function(){
        var myModal = new bootstrap.Modal(document.getElementById('sTypeDetail'), {});
        myModal.toggle();
        }
        </script>";
}

?>





<?php include_once("footer.php") ?>
