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


  <div id="card" class="container mt-5 col-9 border border-5 rounded-5 pb-5 px-auto pt-5 br-5 ">
    <form class="row g-3">
      <div class="mb-3">
        <label class="form-label">Full name</label>
        <input type="text" class="form-control" value="" required>


      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" value="" required>
      </div>


      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
      </div>

      <div class="mb-2">
        <label for="validationServer05" class="form-label">Aadhaar number</label>
        <input type="text" class="form-control" id="validationServer05" required>
      </div>
      <div>
        <label for="Reguster as"> Register as</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Customer
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
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
        <button class="btn btn-primary" type="submit">Register</button>
      </div>
  </div>
  </form>
  </div>
  </form>
  </div>









  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>