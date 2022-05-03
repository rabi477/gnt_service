<?php session_start(); ?>

<?php

if (!isset($_SESSION["utype"])) {
    header("location:index.php");
}

if ($_SESSION["utype"] != "customer") {
    header("location:sdash.php");
}

?>

<?php include_once("header.php") ?>
<?php include_once("cnav.php") ?>

<div class="container">
<div class="row">
        <?php

        include_once("db_conn.php");

        $spqry = "select name,s_type from user,service where utype='service provider' and user.id=service.id;";
        $spres = $conn->query($spqry);

        while ($val = $spres->fetch_assoc()) {
            $snm = $val['name'];
            $stp = $val['s_type'];
            echo "<div class='card text-center border-3 rounded-3 m-2 ' style='width: 18rem;'>
        <img src='./gnt_img/avatar.png' class='card-img-top rounded-circle h-75 w-75 mx-auto mt-3 d-block' alt='avatar'>
        <hr>
        <div class='card-body'>
        <h5 class='card-title'>$snm</h5>
        <p class='card-text'>$stp</p>
        <a href='#' class='btn btn-primary mx-auto'> Message </a>
        </div>
        </div>";
        }

        ?>
</div>
</div>


<?php include_once("footer.php") ?>