<!DOCTYPE html>
<html lang="en">

<?php
//require_once("connection.php");
include("signinaction.php");
$roleId = $_SESSION['roleId'];
$memberId = $_SESSION['memberId'];
?>

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

    <?php include("navbar2.php");

    $query = "SELECT * FROM member WHERE memberId = '$memberId'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    if ($roleId == 1) {
        $query1 = "SELECT * FROM userprofile WHERE userId = '$memberId'";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_array($result1); ?>

        <div class="container mt-5">
            <div class="card mb-3" style="width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="images\\<?php echo $row['profilePicture'] ?>" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['username']; ?></h5>
                            <p class="card-text"><?php echo $row['biography']; ?></p>
                            <a href="editprofile.php" class="btn btn-secondary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    <?php
    } else if ($roleId == 2) {
        $query2 = "SELECT * FROM drprofile WHERE drId = '$memberId'";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_array($result2); ?>

        <div class="container mt-5">
            <div class="card mb-3" style="width: 100%;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="images\\<?php echo $row['profilePicture'] ?>" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['username']; ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                                    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708" />
                                </svg>
                            </h5>
                            <p class="card-text"><?php echo $row['biography']; ?></p>
                            <p class='card-text'>Speciality: <?php echo $row2['specialty']; ?></p>
                            <p class='card-text'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cash' viewBox='0 0 16 16'>
                                    <path d='M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4' />
                                    <path d='M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z' />
                                </svg> &nbsp;&nbsp;&nbsp; $<?php echo $row2['fees']; ?></p>
                            <p class='card-text'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-telephone-fill' viewBox='0 0 16 16'>
                                    <path fill-rule='evenodd' d='M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z' />
                                </svg> &nbsp;&nbsp;&nbsp; <?php echo $row['phoneNumber']; ?>
                            </p>
                            <p class='card-text'><small class='text-body-secondary'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-geo-alt-fill' viewBox='0 0 16 16'>
                                        <path d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6' />
                                    </svg>&nbsp;&nbsp;&nbsp; <?php echo $row2['location']; ?></small></p>
                            <a href="editprofile.php" class="btn btn-secondary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    include("posts.php");
    ?>




</body>

</html>