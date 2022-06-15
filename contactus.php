<?php
include_once("db_conn.php");

extract($_POST);

if(isset($subBtn)){
  $qry = "insert into contact values('$Fname','$email','$comment');";
  if(mysqli_query($conn,$qry)){
    $str = "we received your message, we will contact you shortly!";
  }

}

include_once("header.php");
include_once("navbar.php");
?>

<h2 class="text-center mt-5">Contact Us</h2>
<div class="container mt-5 border border-3 rounded bg-light p-5">
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="Fname" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea name="comment" rows="4" class="form-control"></textarea>
      </div>
      <button type="submit" name="subBtn" class="btn btn-primary d-block mx-auto">Submit</button>
    </form>
</div>


<?php

if(isset($str)){
  echo "<div class='text-center mt-3'>".$str,"</div";
}

include_once("footer.php");

?>