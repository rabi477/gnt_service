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


  <div id="card" class="container my-5 col-9 border border-5 rounded-5 pb-5 px-auto pt-5 ">
    <form class="row g-3" method="POST">
      <div class="mb-3">
        <label class="form-label">Full name</label>
        <input type="text" class="form-control" name="uname" required>
      </div>

      <div>
        <label for="gender"> Gender: </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" checked>
          <label class="form-check-label" for="flexRadioDefault1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="female" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">
            Female
          </label>
        </div>
      </div>


      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" required>
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
      </div>

      <div class="mb-3">
        <label for="validationServer05" class="form-label">Aadhaar number</label>
        <input type="number" class="form-control" id="validationServer05" name="adn" min="0" required>
      </div>

      <div>
        <label for="Reguster as"> Register as</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="utype" value="customer" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Customer
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="utype" value="service provider" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Service provider
          </label>
        </div>
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
          <label class="form-check-label" for="invalidCheck3">
            Agree to terms and conditions
          </label>
          <div id="invalidCheck3Feedback" class="invalid-feedback">
            You must agree before submitting.
          </div>
        </div>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto ">
        <button class="btn btn-primary" type="submit" name="subBtn" >Register</button>
      </div>
    </form>

    <?php
      
      extract($_POST);
      if(isset($subBtn)){
        $conn = mysqli_connect("localhost", "root", "", "gnt_service");
        $qry = "insert into user(name,gender,email,dob,pwd,aadhaar,utype) values('$uname','$gender','$email','$dob','$pwd',$adn,'$utype');";
        
        if($conn->query($qry)){
          echo "Registered Successfully! ";
        }

      }

      
      ?>

  </div>
  



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>