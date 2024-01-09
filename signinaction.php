<?php
    include("connection.php");

    session_start(); // Start the session
    
    if (isset($_POST['signin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Select the hashed password from the database based on the provided username
        $query = "SELECT * FROM member WHERE username = '$username'";
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
                $_SESSION['memberId'] = $row['memberId'];
                $_SESSION['roleId'] = $row['roleId'];
                header("Location: interaction.php");
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