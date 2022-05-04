<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./gnt_img/gntlogo.jpeg" alt="Gnt logo" width="32px" height="32px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      <div class="d-flex">
        <div class="d-flex">
          <!-- Button trigger modal search -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#search">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
        </div>
        <div class="px-3">
          <!-- Button trigger modal login -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
            <img src="./gnt_img/person-circle.svg" alt="">
          </button>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Modal search -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <form class="d-flex justify-content-between">
          <input type="search" class="form-control" name="" id="">
          <button type="submit" class="btn btn-primary mx-2" data-bs-dismiss="modal">Search</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal login -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?php echo $_SESSION["name"]; ?> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post">
          <button type="submit" class="btn btn-primary" name="loutbtn">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
extract($_POST);

if (isset($loutbtn)) {
  setcookie("cred", null, -1, '/');
  session_unset();
  session_destroy();
  header("location:index.php");
}

?>