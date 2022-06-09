<?php

session_start();

include_once('db_conn.php');

extract($_POST);

    $fnm = $_FILES['pfpic']['name'];
    $farr =  explode('.',$fnm);
    $ext = $farr[sizeof($farr)-1];
    $id = $_SESSION['id'];

    $qry = "update user set pfpic='./gnt_img/img_$id.$ext' where id=$id";

    if(file_exists("./gnt_img/img_$id.$ext")){
        unlink("./gnt_img/img_$id.$ext");
    }

    if(move_uploaded_file($_FILES['pfpic']['tmp_name'],"./gnt_img/img_$id.$ext")){
        mysqli_query($conn,$qry);
        $_SESSION["pfpic"]="./gnt_img/img_$id.$ext";
    }

    $str1 = explode("/",$_SERVER["HTTP_REFERER"]);
    $str2 = $str1[sizeof($str1)-1];
    header("location:$str2");

?>


