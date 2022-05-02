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

<?php include_once("footer.php") ?>
