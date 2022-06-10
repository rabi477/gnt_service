  <?php include_once("header.php") ?>
  <?php include("navbar.php"); ?>

  <?php

    include_once("send_email.php");

    extract($_POST);
    if (isset($subBtn)) {
      include_once("db_conn.php");

      $chkqry = "select * from user where email='$email' or aadhaar=$adn;";
      $res  = $conn->query($chkqry);

      if(!$res->num_rows>0){
        $qry = "insert into user(name,gender,email,dob,pwd,aadhaar,utype,address,pincode) values('$uname','$gender','$email','$dob','$pwd',$adn,'$utype','$address',$pincode);";

        if ($conn->query($qry)) {
          echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
          <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
          <div>
            Activation Link Send to your email address ! 
          </div>
        </div>";
          $msg = "http://".$_SERVER["SERVER_NAME"]."/gnt_service/verify.php?".base64_encode($email);
          send_link($email,"GNT_Service",$msg,"Verify your Account with GNT Service");
        }
      }
      else{
        echo "<div class='alert alert-warning d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
        <div>
          Email or Aadhaar already registered !
        </div>
      </div>";
      }
      

    }


    ?>

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
        <input type="email" class="form-control" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" minlength="8" maxlength="16" class="form-control" name="pwd" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Aadhaar number</label>
        <input type="number" class="form-control" name="adn"  required>
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
      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea cols="6" rows="4" class="form-control" name="address" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Pincode</label>
        <input type="number" class="form-control" name="pincode" required>
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
        <button class="btn btn-primary" type="submit" name="subBtn">Register</button>
      </div>
    </form>

    
  </div>

  <?php include_once("footer.php") ?>