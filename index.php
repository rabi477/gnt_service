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
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="pwd">
                    <span class="input-group-text"><i class="bi bi-eye-slash-fill" id="togglePassword" style="cursor: pointer;"></i></span>
                </div>
            </div>
            <div class="mb-3 form-check ">
                <input type="checkbox" class="form-check-input" id="rme">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-primary" name="subBtn">Login</button>
            </div>

        </form>

        <div class="mt-3">
            <a href="forgotpass.php">Forgot Password?</a>
        </div>


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
                $a = mysqli_fetch_assoc($res);

                if ($a["verification"] == 1) {
                    session_start();

                    $_SESSION["name"] = $a["name"];
                    $_SESSION["email"] = $a["email"];
                    $_SESSION["utype"] = $a["utype"];
                    $_SESSION["id"] = $a["id"];


                    if ($a["utype"] == "customer") {
                        header("location:cdash.php");
                    } else if ($a["utype"] == "service provider") {
                        header("location:sdash.php");
                    }
                } else {
                    echo "<p style='color:green'> <br>Verification Link Send to your email, please activate your account </p>";
                    include_once("send_email.php");
                    $msg = "http://" . $_SERVER["SERVER_NAME"] . "/gnt_service/verify.php?" . base64_encode($email);
                    send_link($email, "GNT_Service", $msg, "Verify your Account with GNT Service");
                }
            } else {
                echo "<p style='color:red'> <br>Incorrect email or password </p>";
            }
        }



        ?>

    </div>



    <?php include_once("footer.php") ?>