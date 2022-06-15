<?php
session_start();

if (!isset($_SESSION["utype"]) || $_SESSION["utype"] != "admin") {
    header("location:index.php");
}

include_once("header.php");
?>



<?php
include_once("footer.php");
?>