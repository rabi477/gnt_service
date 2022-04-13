<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./gnt_img/gntlogo.jpeg" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome to GNT Service</title>
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container mt-5">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
<<<<<<< HEAD
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
=======
                <label class="form-check-label" for="exampleCheck1">Remember me </label>
>>>>>>> f842e205ea8165d1067ad68c62863e4d49acc5f1
            </div>
            <button type="submit" class="btn btn-primary" name="subBtn">Login</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>

<?php

extract($_POST);

if (isset($subBtn)) {

    $conn = mysqli_connect("localhost", "root", "", "gnt_service");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $qry = "select * from user where email='$email' and pwd='$pwd';";


    $res = $conn->query($qry);

    if ($res->num_rows > 0) {
        echo "logged in successfully";
    } else {
        echo "login failed";
    }
}





?>