<?php

// Assuming you have a valid database connection in $con
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["postId"]) && isset($_POST["isLiked"])) {
    $postId = $_POST["postId"];
    $isLiked = $_POST["isLiked"];

    // Update the like count in the database
    $updateQuery = "UPDATE posts SET likeCount = likeCount " . ($isLiked ? "+ 1" : "- 1") . " WHERE postId = '$postId'";
    $updateResult = mysqli_query($con, $updateQuery);

    if (!$updateResult) {
        // Handle the error if needed
        die("Error updating like count: " . mysqli_error($con));
    }

    // Return updated like count
    $updatedQuery = "SELECT likeCount FROM posts WHERE postId = '$postId'";
    $updatedResult = mysqli_query($con, $updatedQuery);
    
    if ($updatedResult) {
        $updatedRow = mysqli_fetch_assoc($updatedResult);
        $updatedLikeCount = $updatedRow['likeCount'];
        
        echo json_encode(["success" => true, "likeCount" => $updatedLikeCount]);
    } else {
        // Handle the error if needed
        die("Error fetching updated like count: " . mysqli_error($con));
    }
} else {
    // Handle invalid request
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>
