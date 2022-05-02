<?php session_start(); ?>

<?php

    if (!isset($_SESSION["utype"])) {
        header("location:index.php");
    }

    if($_SESSION["utype"]!="customer"){
        header("location:sdash.php");
    }

?>

<?php include_once("header.php") ?>
<?php include_once("cnav.php") ?>

<?php include_once("footer.php") ?>
