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
    
    include_once("send_email.php");

    extract($_POST);
    if (isset($subBtn)) {
      include_once("db_conn.php");
      
        $qry = "select * from user where email=$email";
        $res = $conn->query($qry);
        

      if ($res->num_rows>0) {
        echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
        <div>
          Password Reset Link Send to your email address ! 
        </div>
      </div>";
        $msg = "http://".$_SERVER["SERVER_NAME"]."/gnt_service/resetpass.php?".base64_encode($email);
        send_link($email,"GNT_Service",$msg,"Password Reset with GNT Service");
      }
      else
      {
        echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
        <div>
          Please Register yourself with us ! 
        </div>
      </div>";
      }
    }


    
    ?>

    <br><br>
    <div class="container-md mt-5 col-8 border border-5 rounded-3 pb-5 px-5">
        <form method="post">
            <div class="mb-3">

                <br><br>
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
  
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-primary" name="subBtn">Forgot Password</button>
            </div>

        </form>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>