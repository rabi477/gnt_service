    <?php
    if (isset($_COOKIE['cred'])) {
        $email = explode(':', $_COOKIE['cred'])[0];
        $pwd = explode(':', $_COOKIE['cred'])[1];

        include_once("db_conn.php");

        if ($conn->connect_error) {
            die("Connection failed");
        }
        $qry = "select * from user where email='$email' and pwd='$pwd';";
        $res = $conn->query($qry);

        $a = mysqli_fetch_assoc($res);


        if ($a["verification"] == 1) {
            session_start();

            $_SESSION["name"] = $a["name"];
            $_SESSION["email"] = $a["email"];
            $_SESSION["utype"] = $a["utype"];
            $_SESSION["id"] = $a["id"];
            $_SESSION["pfpic"] = $a["pfpic"];

            if (isset($rme)) {
                setcookie("cred", $email . ":" . $pwd, time() + 86400, '/');
            }


            if ($a["utype"] == "customer") {
                header("location:cdash.php");
            } else if ($a["utype"] == "service provider") {
                header("location:sdash.php");
            }
        }
    }

    session_start();

    if ($_SESSION["utype"] == "customer") {
        header("location:cdash.php");
    }

    if ($_SESSION["utype"] == "service provider") {
        header("location:sdash.php");
    }


    ?>

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
                <input type="checkbox" class="form-check-input" name="rme">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-primary" name="subBtn">Login</button>
            </div>

        </form>

        <div class="mt-3">
            <div>
                <a href="forgotpass.php">Forgot Password?</a>
            </div>
            <div class="mt-3">
                <a href="register.php">New User?</a>
            </div>
        </div>


        <?php



        extract($_POST);

        if (isset($subBtn)) {

            include_once("db_conn.php");

            if ($conn->connect_error) {
                die("Connection failed");
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
                    $_SESSION["pfpic"] = $a["pfpic"];
                    $_SESSION["address"] = $a["address"];
                    $_SESSION["pincode"] = $a["pincode"];

                    if (isset($rme)) {
                        setcookie("cred", "$email:$pwd", time() + 86400, '/');
                    }

                    if($a["utype"] == "service provider"){
                        $id = $a["id"];
                        $sqry = "select s_type from service where id=$id;";
                        $res2 = mysqli_query($conn,$sqry);
                        $val = mysqli_fetch_assoc($res2);
                        $_SESSION['s_type'] = $val['s_type'];
                    }


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

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function() {

            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye icon
            this.classList.toggle('bi-eye-fill');
            this.classList.toggle('bi-eye-slash-fill');
        });
    </script>


    <?php include_once("footer.php"); ?>