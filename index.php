    <?php include_once("header.php") ?>
    <?php include("navbar.php"); ?>

    <br><br>
    <div class="container-md my-5 col-8 border border-5 rounded-3 pb-5 px-3">
        <form method="post">
            <div class="mb-3">

                <br><br>
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
            </div>
            <div class="mb-3 form-check ">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-primary" name="subBtn">Login</button>
            </div>

        </form>

        <a href="forgotpass.php">Forgot Password?</a>

        <?php

        extract($_POST);

        if (isset($subBtn)) {

            include_once("db_conn.php");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $qry = "select * from user where email='$email' and pwd='$pwd';";


            $res = $conn->query($qry);

            if ($res->num_rows > 0) {
                echo "logged in successfully";
            } else {
                echo "<p style='color:red'> Incorrect email or password </p>";
            }
        }

        

        ?>

    </div>


<?php include_once("footer.php") ?>