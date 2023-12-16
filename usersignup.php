<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>WeCare - user sign up</title>
    <link href="style2.css" rel="stylesheet">
</head>

<body>
    <?php
    include("connection.php");

    if (isset($_POST['signup'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $vpassword = mysqli_real_escape_string($con, $_POST['v-password']);        

        //check if the db have the name and email
        $query1 = "SELECT * FROM member where username = '$username'";
        $result1 = mysqli_query($con, $query1);  //fetch
        $count_name = mysqli_num_rows($result1); // count the num of row having the same name
    
        $query2 = "SELECT * FROM member where email = '$email'";
        $result2 = mysqli_query($con, $query2);
        $count_email = mysqli_num_rows($result2);

        if ($count_name === 0 && $count_email === 0) {
            if ($password == $vpassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $query3 = "INSERT INTO member(username, email, password, roleId) 
                VALUES('$username', '$email', '$hash', 1)";
                $result3 = mysqli_query($con, $query3);
                if ($result3) {
                    header("Location: home.php");
                }
            } else{
                echo'<script>
                window.location.href = "usersignup.php";
                alert("Password do not match");
                </script>';
            }
        } else {
            if ($count_name > 0) {
                echo '<script>
            window.location.href="usersignup.php";
            alert("Username already exists")
            </script>';
            }
            if ($count_email > 0) {
                echo '<script>
        window.location.href="usersignup.php";
        alert("Email already exists")
        </script>';
            }
        }
    }

    ?>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 px-md-5 py-md-5">
                    <h1 class="font-weight-bold py-3 brand">WeCare</h1>
                    <h5>CREATE AN ACCOUNT AS A USER</h5>

                    <form method="POST" action="" onsubmit="return isValid()">
                        <div class="mt-5"></div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="email" class="form-control p-3" placeholder="ENTER YOUR EMAIL" name="email"
                                    id="email" oninput="removeErrorClass('email')">
                                <div id="emailError" class="text-danger" style="float: right;"></div>
                                <div class="my-5"></div>
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
                                <input type="password" class="form-control p-3" placeholder="VERIFY YOUR PASSWORD"
                                    name="v-password" id="v-password" oninput="removeErrorClass('v-password')">
                                <div id="v-passwordError" class="text-danger" style="float: right;"></div>
                                <div class="my-5"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <input type="submit" class="btn1 mt-2 mb-4" value="CREATE ACCOUNT" name="signup" />
                            </div>
                        </div>
                    </form>
                    <p class="mt-5">Already a member? <a href="signIn.php">Sign In to your account</a></p>
                </div>
                <div class="col-lg-5">
                    <img src="images/signin.jpg" class="img-fluid" style="height: auto; width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <script>
        function isValid() {
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var vpassword = document.getElementById('v-password').value;
            var isValid = true;

            if (email.length === 0) {
                setErrorClass('email');
                setError('email', 'Email field is empty');
                isValid = false;
            } else {
                removeErrorClass('email');
                removeError('email');
            }

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

            if (vpassword.length === 0) {
                setErrorClass('v-password');
                setError('v-password', 'Password verification field is empty');
                isValid = false;
            } else {
                removeErrorClass('v-password');
                removeError('v-password');
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