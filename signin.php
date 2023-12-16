<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeCare - Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="style2.css" rel="stylesheet">
</head>

<body>
    <?php
    include("connection.php");

    session_start(); // Start the session
    
    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Select the hashed password from the database based on the provided username
        $query = "SELECT password FROM member WHERE username = '$username'";
        $result = mysqli_query($con, $query);
    
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }
    
        // Check if a user with the given username exists
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashed_pass_from_db = $row['password'];
    
            // Use password_verify to check if the entered password matches the hashed password
            if (password_verify($password, $hashed_pass_from_db)) {
                // Password is correct
                // Redirect to the home page or perform other actions
                $_SESSION['username'] = $username; // Set a session variable if needed
                header("Location: home.php");
                exit();
            }
        }
    
        // If execution reaches here, it means the login failed
        $_SESSION['loginFailed'] = true; // Set the session variable when login fails
        header("Location: signin.php");
        exit();
    }

    // Check if the session variable is set
    $loginFailed = isset($_SESSION['loginFailed']) && $_SESSION['loginFailed'];

    // Unset the session variable to remove the message after displaying it
    unset($_SESSION['loginFailed']);
    ?>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 px-md-5 py-md-5">
                    <h1 class="font-weight-bold py-3 brand">WeCare</h1>
                    <h5>SIGN IN TO YOUR ACCOUNT</h5>



                    <form method="POST" action="" onsubmit="return isValid()">
                    <div class="mt-5"></div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <?php
                                // Display error message if login fails
                                if ($loginFailed) {
                                    echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="text" class="form-control p-3" placeholder="ENTER YOUR USERNAME"
                                    name="username" id="username" oninput="removeErrorClass('username')">
                                <div id="usernameError" class="text-danger" style="float: right;"></div>
                                <div class="my-5"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="password" class="form-control p-3" placeholder="ENTER YOUR PASSWORD"
                                    name="password" id="password" oninput="removeErrorClass('password')">
                                <div id="passwordError" class="text-danger" style="float: right;"></div>
                                <div class="my-5"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="submit" class="btn1 mt-2 mb-4" value="SIGN IN" name="signin" />
                            </div>
                        </div>
                    </form>
                    <a href="#">Forgot Password?</a>
                    <p class="mt-2">Don't have an account? <a href="signup.php">Create Account</a></p>
                </div>
                <div class="col-lg-5">
                    <img src="images/signin.jpg" class="img-fluid" style="height: 100%; width: auto;">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>

    <script>
        function isValid() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var isValid = true;

            if (username.length === 0) {
                setErrorClass('username');
                setError('username', 'Username field is empty');
                isValid = false;
            } else {
                removeErrorClass('username');
                removeError('username');
            }

            if (password.length === 0) {
                setErrorClass('password');
                setError('password', 'Password field is empty');
                isValid = false;
            } else {
                removeErrorClass('password');
                removeError('password');
            }

            return isValid;
        }

        function setError(fieldId, errorMessage) {
            document.getElementById(fieldId + 'Error').innerHTML = errorMessage;
        }

        function removeError(fieldId) {
            document.getElementById(fieldId + 'Error').innerHTML = '';
        }

        function setErrorClass(fieldId) {
            document.getElementById(fieldId).classList.add('is-invalid');
        }

        function removeErrorClass(fieldId) {
            document.getElementById(fieldId).classList.remove('is-invalid');
        }
    </script>

    <style>
        .is-invalid {
            border-color: #dc3545;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</body>

</html>