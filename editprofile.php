<!DOCTYPE html>
<html lang="en">

<?php
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

    <?php include("navbar2.php"); ?>

    <?php
    $query = "SELECT * FROM member WHERE memberId = '$memberId'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    $profilepicture = $row['profilePicture'];
    $username = $row['username'];
    $biography = $row['biography'];
    $phoneNumber = $row['phoneNumber'];
    ?>

    <section class="Form mx-2">
        <div class="container">
            <div class="row g-0">
                <h1 class="font-weight-bold py-3">Edit Profile</h1>

                <div class="col-lg-6 px-md-5 py-md-5">
                    <form method="POST" action='editprofileaction.php?id=<?php echo $memberId; ?>' enctype="multipart/form-data" onsubmit="">
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="profilepicture" class=" col-form-label">Profile Picture</label>
                                <input type="file" class="form-control p-3"  name="profilepicture" id="profilepicture">
                                <div class="my-2"></div>
                                <input type="hidden" name="old_profile_picture" value='<?php echo $profilepicture ?>'>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="username" class=" col-form-label">Username</label>
                                <input type="text" class="form-control p-3" value='<?php echo $username ?>' name="username" id="username">
                                <div class="my-2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="biography" class=" col-form-label">Biography</label>
                                <input type="text" class="form-control p-3" value='<?php echo $biography ?>' name="biography" id="biography">
                                <div class="my-2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="phonenumber" class=" col-form-label">Phone Number</label>
                                <input type="number" class="form-control p-3" value='<?php echo $phoneNumber ?>' name="phonenumber" id="phonenumber">
                                <div class="my-2"></div>
                            </div>
                        </div>

                        <?php
                        if ($roleId == 2) {
                            $query = "SELECT * FROM drprofile WHERE drId = '$memberId'";
                            $result = mysqli_query($con, $query);
                            $row = mysqli_fetch_array($result);

                            $orderOfMedId = $row['orderOfMedId'];
                            $specialty = $row['specialty'];
                            $fees = $row['fees'];
                            $location = $row['location'];
                            $gender = $row['gender'];
                            $dob = $row['dob'];

                            echo "
                        <div class='form-row'>
                            <div class='col-lg-10'>
                                <label for='orderOfMedId' class=' col-form-label'>Order Of Medicine Id</label>
                                <input type='number' class='form-control p-3' value='$orderOfMedId' name='orderOfMedId' id='orderOfMedId'>
                                <div class='my-2'></div>
                            </div>
                        </div>
                        ";
                        }
                        ?>
                </div>

                <!-- Display additional fields based on roleId -->
                <div class="col-lg-6 px-md-5 py-md-5">
                    <?php

                    if ($roleId == 1) {
                        $query = "SELECT * FROM userprofile WHERE userId = '$memberId'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);

                        $gender = $row['gender'];
                        $dob = $row['dob'];

                        echo '
                        <div class="form-row">
                    <div class="col-lg-10">
                        <label for="gender" class=" col-form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="Female">
                            <label class="form-check-label" for="gender1">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="Male">
                            <label class="form-check-label" for="gender2">
                                Male
                            </label>
                        </div>
                        <div class="my-2"></div>
                    </div>
                </div>
                        ';

                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">';
                        echo "<label for='dob' class=' col-form-label' value='$dob'>Date of Birth</label>";
                        echo '<input type="date" class="form-control p-3" name="dob" id="dob">
                                <div class="my-2"></div>
                            </div>
                        </div>
                        ';
                    } else if ($roleId == 2) {

                        echo "
                        <div class='form-row'>
                            <div class='col-lg-10'>
                                <label for='specialty' class=' col-form-label'>Specialty</label>
                                <input type='text' class='form-control p-3' value='$specialty' name='specialty' id='specialty'>
                                <div class='my-2'></div>
                            </div>
                        </div>
                        ";

                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="fees" class=" col-form-label">Fees</label>';
                        echo "<input type='number' step='0.01' class='form-control p-3' value='$fees' name='fees' id='fees'>";
                        echo '<div class="my-2"></div>
                            </div>
                        </div>
                        ';

                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="location" class=" col-form-label">Location</label>';
                        echo "<input type='text' class='form-control p-3' value='$location' name='location' id='location'>";
                        echo '<div class="my-2"></div>
                            </div>
                        </div>
                        ';

                        echo '
                        <div class="form-row">
                    <div class="col-lg-10">
                        <label for="gender" class=" col-form-label">Gender</label>
                        <div class="form-check"> ';
                        echo "<input class='form-check-input' type='radio' name='gender' id='gender1' value='Female'>";
                        echo '<label class="form-check-label" for="gender1">
                                Female
                            </label>
                        </div>
                        <div class="form-check">';
                        echo " <input class='form-check-input' type='radio' name='gender' id='gender2' value='Male'>";
                        echo ' <label class="form-check-label" for="gender2">
                                Male
                            </label>
                        </div>
                        <div class="my-2"></div>
                    </div>
                </div>
                        ';

                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">';
                        echo "<label for='dob' class=' col-form-label' value='$dob'>Date of Birth</label>";
                        echo '<input type="date" class="form-control p-3" name="dob" id="dob">
                                <div class="my-2"></div>
                            </div>
                        </div>
                        ';
                    } else if ($roleId == 3) {
                        $query = "SELECT * FROM hospitalprofile WHERE hospitalId = '$memberId'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);

                        $location = $row['location'];

                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="location" class=" col-form-label">Location</label>';
                        echo "<input type='text' class='form-control p-3' value='$location' name='location' id='location'>";
                        echo '<div class="my-2"></div>
                            </div>
                        </div>
                        ';

                        echo '
                        <div class="form-row">
                    <div class="col-lg-10">
                        <label for="gender" class=" col-form-label">Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type1" value="public">
                            <label class="form-check-label" for="type1">
                                Public
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type2" value="private">
                            <label class="form-check-label" for="type2">
                                Private
                            </label>
                        </div>
                        <div class="my-2"></div>
                    </div>
                </div>
                        ';
                    } else if ($roleId == 4) {
                        $query = "SELECT * FROM pharmacyprofile WHERE pharmacyId = '$memberId'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);

                        $location = $row['location'];
                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="location" class=" col-form-label">Location</label>';
                        echo "<input type='text' class='form-control p-3' value='$location' name='location' id='location'>";
                        echo '<div class="my-2"></div>
                            </div>
                        </div>
                        ';
                    } else if ($roleId == 5) {
                        $query = "SELECT * FROM labprofile WHERE labId = '$memberId'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_array($result);

                        $location = $row['location'];
                        echo '
                        <div class="form-row">
                            <div class="col-lg-10">
                                <label for="location" class=" col-form-label">Location</label>';
                        echo "<input type='text' class='form-control p-3' value='$location' name='location' id='location'>";
                        echo '<div class="my-2"></div>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                    <div class="form-row">
                        <div class="col-lg-10">
                            <input type="submit" class="btn mt-5 mb-4 btn-primary float-end" value="Edit" name="Edit" />
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>


</body>

</html>