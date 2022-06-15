<?php
include_once("header.php");
include_once("navbar.php");
?>

<h2 class="text-center mt-5">Contact Us</h2>
<div class="container mt-5 border border-3 rounded bg-light p-5">
    <form>
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
      <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
    </form>
</div>

<?php
include_once("footer.php");
?>