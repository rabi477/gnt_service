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
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<script>
  window.onload = function(){
    var myModal = new bootstrap.Modal(document.getElementById('sTypeDetail'), {})
    myModal.toggle()
  }
</script>


<?php include_once("footer.php") ?>
