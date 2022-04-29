<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./gnt_img/gntlogo.jpeg" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to GNT Service</title>

</head>

<body>
    <?php include("navbar.php"); ?>

    <?php

        extract($_POST);

        $em = base64_decode(explode("?",$_SERVER["REQUEST_URI"])[1]);

        if (isset($subBtn)) {

            include_once("db_conn.php");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $qry = "update user set pwd='$pwd' where email=$em ";

            if ($conn->query($qry)) {
                echo "<p style='color:green'> Password Changed </p>";
            } else {
                echo "<p style='color:red'> Error Occured </p>";
            }
        }

    ?>

    <br><br>
    <div class="container-md mt-5 col-8 border border-5 rounded-3 pb-5 px-5">
        <form method="post" onsubmit="return conpass()" on >
            <div class="mb-3">
                <br><br>
                <label for="exampleInputEmail1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="p1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="p2" name="pwd" onkeyup="checkpass()" >
            </div>
            <p style="color:red" id="conmsg"></p>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-primary" name="subBtn">Submit</button>
            </div>
            <p id="demo"></p>
        </form>



    </div>
    <script>

        function checkpass(){
            let pass1 = document.getElementById('p1').value;
            let pass2 = document.getElementById('p2').value;
            if(pass1 != pass2)
                document.getElementById('conmsg').innerHTML = "Password does not match !";
            else
                document.getElementById('conmsg').innerHTML = "";
        }

        function conpass(){
            let pass1 = document.getElementById('p1').value;
            let pass2 = document.getElementById('p2').value;
            if(pass1 == pass2)
                return true;
            else
                alert("Password does not match !, Please check it")
                return false;

        }

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>