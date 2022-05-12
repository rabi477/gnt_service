<?php
session_start();

include_once('db_conn.php');

$fnm = $_FILES['pfpic']['name'];
$farr =  explode('.',$fnm);
$ext = $farr[sizeof($farr)-1];
$id = $_SESSION['id'];

$qry = "update user set pfpic='./gnt_img/img_$id.$ext' where id=$id";

if(file_exists("./gnt_img/img_$id.$ext")){
    unlink("./gnt_img/img_$id.$ext");
}

if(move_uploaded_file($_FILES['pfpic']['tmp_name'],"./gnt_img/img_$id.$ext")){
    $conn->query($qry);

    $str=<<<idfr
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Uploaded Succesfully !</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    idfr;

    echo $str;

}else{
    $str=<<<idfr
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Upload Failed!</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    idfr;

    echo $str;
}

?>