<?php
require_once("connection.php");

$memberId = isset($_GET["id"]) ? $_GET["id"] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roleIdQuery = "SELECT roleId FROM member WHERE memberId = '$memberId'";
    $roleIdResult = mysqli_query($con, $roleIdQuery);

    $row = mysqli_fetch_array($roleIdResult);

    $roleId = $row['roleId'];

    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    $biography = isset($_POST["biography"]) ? $_POST["biography"] : '';
    $phoneNumber = isset($_POST["phonenumber"]) ? $_POST["phonenumber"] : '';
    //$profilepicture = isset($_FILES["profilepicture"]["name"]) ? $_FILES["profilepicture"]["name"] : $_FILES[$row['profilePicture']];

    if ($_FILES["profilepicture"]["error"] == 0) {
        $profilepicture = $_FILES["profilepicture"]["name"];

        // Move the uploaded file to the "images" folder
        move_uploaded_file(
            $_FILES["profilepicture"]["tmp_name"],
            "images/" . $profilepicture
        );
    } else {
        // No new picture uploaded, handle this case based on your requirements
        $profilepicture = isset($_POST["old_profile_picture"]) ? $_POST["old_profile_picture"] : '';
    }

    $query = "UPDATE member SET
                 username = '$username',
                 biography = '$biography',
                 phoneNumber = '$phoneNumber',
                 profilePicture = '$profilepicture'
              WHERE memberId = '$memberId'";

    $result = mysqli_query($con, $query);

    if ($roleId == 1) {
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $dob = isset($_POST['dob']) ? $_POST['dob'] : '';

        $query = "UPDATE userprofile SET
                    gender = '$gender',
                    dob = '$dob'
                  WHERE userId = '$memberId'";

        $result = mysqli_query($con, $query);
    } else if ($roleId == 2) {
        $orderOfMedId = isset($_POST['orderOfMedId']) ? $_POST['orderOfMedId'] : '';
        $specialty = isset($_POST['specialty']) ? $_POST['specialty'] : '';
        $fees = isset($_POST['fees']) ? $_POST['fees'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $dob = isset($_POST['dob']) ? $_POST['dob'] : '';

        $query = "UPDATE drprofile SET
                    orderOfMedId = '$orderOfMedId',
                    specialty = '$specialty',
                    fees = '$fees',
                    location = '$location',
                    gender = '$gender',
                    dob = '$dob'
                  WHERE drId = '$memberId'";

        $result = mysqli_query($con, $query);
    } else if ($roleId == 3) {
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';

        $query = "UPDATE hospitalprofile SET
                     location = '$location',
                     type = '$type'
                   WHERE hospitalId = '$memberId'";

        $result = mysqli_query($con, $query);
    } else if ($roleId == 4) {
        $location = isset($_POST['location']) ? $_POST['location'] : '';

        $query = "UPDATE pharmacyprofile SET 
                    location = '$location'
                    WHERE pharmacyId = '$memberId'";

        $result = mysqli_query($con, $query);

    } else if($roleId == 5){
        $location = isset($_POST['location']) ? $_POST['location'] : '';

        $query = "UPDATE labprofile SET 
                    location = '$location'
                    WHERE labId = '$memberId'";

        $result = mysqli_query($con, $query);
    }

    if (!$result) {
        die("Error updating record: " . mysqli_error($con));
    }

    header("Location: myprofile.php");
    exit();
}
