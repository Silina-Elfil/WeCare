<?php
include("signinaction.php");
$roleId = $_SESSION['roleId'];
$memberId = $_SESSION['memberId'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $caption = isset($_POST["caption"]) ? $_POST["caption"] : '';

    // Process the uploaded picture
    if ($_FILES["picture"]["error"] == 0) {
        // New picture is uploaded
        $picture = $_FILES["picture"]["name"];

        // Move the uploaded file to a folder
        move_uploaded_file(
            $_FILES["picture"]["tmp_name"],
            "images/" . $picture
        );
    } else {
        $picture = '';
    }

    // Get the current date
    $currentDate = date("Y-m-d H:i:s");

    // Insert data into the "posts" table
    $query = "INSERT INTO posts (image, text, date, likeCount, commentCount, memberId)
              VALUES ('$picture', '$caption', '$currentDate', 0, 0, '$memberId')";

    $result = mysqli_query($con, $query);

    if ($result) {
        // Successful insertion, redirect to the explore page or wherever you want
        header("Location: myprofile.php");
        exit();
    } else {
        // Error inserting record
        die("Error inserting record: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>WeCare - Explore</title>
</head>

<body>

    <?php include("navbar2.php"); ?>

    <div class="container mt-5">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h1 class="card-title">Create Post</h1>
                <form method="POST" action='' enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-lg-10">
                            <label for="picture" class="col-form-label">Picture</label>
                            <input type="file" class="form-control p-3" name="picture" id="picture">
                            <div class="my-2"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10">
                            <label for="caption" class="col-form-label">Caption</label>
                            <input type="text" class="form-control p-3" name="caption" id="caption">
                            <div class="my-2"></div>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-lg-10">
                            <a href="#" class="btn btn-secondary">CANCEL</a>
                            <button type="submit" class="btn btn-primary">POST</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>