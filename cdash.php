<?php session_start();

if (!isset($_SESSION["utype"]) || $_SESSION["utype"]!="customer") {
    header("location:index.php");
}

include_once("header.php");
include_once("cnav.php");


?>


<div class="offcanvas offcanvas-end" tabindex="-1" id="cmsg" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Messages</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="position-relative h-100">
            <div class="d-flex position-absolute bottom-0 w-100">
                <input type="text" class="form-control" placeholder="Type Message Here ...">
                <button type="submit" class="btn btn-primary mx-2 px-3 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-around">
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
        <a href='#' class='btn btn-primary mx-auto' data-bs-toggle='offcanvas' data-bs-target='#cmsg' aria-controls='offcanvasRight' > Message </a>
        </div>
        </div>";
        }

        ?>
    </div>
</div>


<?php include_once("footer.php") ?>