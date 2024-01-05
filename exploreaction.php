<?php

include("connection.php");

$query = "SELECT m.profilePicture, m.username, m.phoneNumber, dr.specialty, dr.location, dr.fees
          FROM member m
          JOIN drprofile dr ON m.memberId = dr.drId
          WHERE m.roleId = 2";
$result = mysqli_query($con, $query);

echo '<div class="row">';

while ($row = mysqli_fetch_array($result)) {
    echo '<div class="col-lg-6 p-0">'; 
    echo '<div class="card" style="max-width: 600px;">';
    echo '<div class="row g-0">';
    echo '<div class="col-md-4">';
    $img = $row['profilePicture'];
    echo "<img src='..\\images\\$img' class='img-fluid rounded-start' alt='img'>";
    echo "</div>";
    echo '<div class="col-md-8">';
    echo '<div class="card-body">';
    $username = $row['username'];
    echo "<h5 class='card-title'>Dr. $username</h5>";
    $specialty = $row['specialty'];
    echo "<p class='card-text'>Speciality: $specialty</p>";
    $fees = $row['fees'];
    echo "<p class='card-text'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cash' viewBox='0 0 16 16'>
    <path d='M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4'/>
    <path d='M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z'/>
  </svg> &nbsp;&nbsp;&nbsp; $fees</p>";
    $phoneNumber = $row['phoneNumber'];
    echo "<p class='card-text'> 
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-telephone-fill' viewBox='0 0 16 16'>
          <path fill-rule='evenodd' d='M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z'/>
          </svg> &nbsp;&nbsp;&nbsp; $phoneNumber</p>";
    $location = $row['location'];
    echo "<p class='card-text'><small class='text-body-secondary'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-geo-alt-fill' viewBox='0 0 16 16'>
          <path d='M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6'/>
          </svg>&nbsp;&nbsp;&nbsp; $location</small></p>";
    echo '</div></div></div></div></div>';
}

echo '</div>'; // Close the row container
?>
