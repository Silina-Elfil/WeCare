<?php

// Include necessary files and start the session
include("connection.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION['memberId'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['memberId'];

// Fetch posts created by other users
$query = "SELECT p.*, m.username FROM posts p
          JOIN member m ON p.memberId = m.memberId
          WHERE p.memberId != '$userId'
          ORDER BY p.date DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error fetching posts: " . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .like-button,
        .comment-button {
            cursor: pointer;
        }

        .like-button:hover,
        .comment-button:hover {
            color: red;
        }
    </style>
    <title>WeCare - Interactions</title>
</head>

<body>
    <?php include("navbar2.php"); ?>
    <div class="container mt-5 mx-auto">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $postId = $row['postId'];
            $datePosted = date("F j, Y, g:i a", strtotime($row['date']));
            $caption = $row['text'];
            $image = $row['image'];
            $likeCount = $row['likeCount'];
            $commentCount = $row['commentCount'];
            $username = $row['username'];
        ?>
            <div class="card mb-3 w-50 mx-auto">
                <div class="card-body text-center">
                    <div>
                        <h3 class="card-title float-start"><?= $username ?></h3>
                    </div>
                    </br>
                    <div>
                        <p class="card-text float-end" style="color: darkgrey"><?= $datePosted ?></p>
                    </div>
                    </br>
                    <div>
                        <p class="card-text float-start"><?= $caption ?></p>
                    </div>
                    </br></br>
                    <?php if (!empty($image)) { ?>
                        <img src="images/<?= $image ?>" class="img-fluid" alt="Post Image" style="height: 300px;">
                    <?php } ?>
                    </br>
                    <div class="mt-3 float-start">
                        <span class="like-button" data-post-id="<?= $postId ?>" data-like-count="<?= $likeCount ?>" onclick="toggleLike(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart like-icon">
                                <path d="M12 21.35l-1.45-1.32C6.1 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C15.09 3.81 16.76 3 18.5 3 21.58 3 24 5.42 24 8.5c0 3.78-4.1 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                        </span>
                        <span class="like-count"><?= $likeCount ?></span>
                        <span class="comment-button" data-toggle="modal" data-target="#commentModal<?= $postId ?>" data-post-id="<?= $postId ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-dots comment-icon">
                                <path d="M3 6a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6zm0 5a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-2zm0 5a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-2z" />
                            </svg>
                        </span>
                        <span class="comment-count"><?= $commentCount ?></span>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    mysqli_data_seek($result, 0); // Reset result set pointer
    while ($row = mysqli_fetch_assoc($result)) {
        $postId = $row['postId'];
    ?>

<div class="modal fade" id="commentModal<?= $postId ?>" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel<?= $postId ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel<?= $postId ?>">Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="commentList<?= $postId ?>"></div>
                <form id="commentForm<?= $postId ?>">
                    <div class="form-group">
                        <label for="commentText<?= $postId ?>">Add a Comment:</label>
                        <textarea class="form-control" id="commentText<?= $postId ?>" name="commentText" rows="3"></textarea>
                    </div>
                    <input type="hidden" id="postId<?= $postId ?>" name="postId" value="<?= $postId ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
    ?>


        <script>
            function toggleLike(likeButton) {
                const postId = likeButton.getAttribute('data-post-id');
                const likeCountElement = likeButton.nextElementSibling;

                // Check if the like button is already filled
                const isLiked = likeButton.classList.contains('text-danger');

                // Toggle the like button style
                likeButton.classList.toggle('text-danger', !isLiked);

                // Update like count locally
                const currentLikeCount = parseInt(likeCountElement.textContent);
                likeCountElement.textContent = isLiked ? currentLikeCount - 1 : currentLikeCount + 1;

                // Send an AJAX request to update like count in the database
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response if needed
                    }
                };
                xhr.open("POST", "update_like_count.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("postId=" + postId + "&isLiked=" + (isLiked ? 0 : 1));

                $('.modal').on('shown.bs.modal', function () {
            const postId = $(this).find('.comment-button').attr('data-post-id');
            loadComments(postId);
        });

        document.getElementById('commentForm<?= $postId ?>').addEventListener('submit', function(event) {
        event.preventDefault();
        const postId = document.getElementById('postId<?= $postId ?>').value;
        const commentText = document.getElementById('commentText<?= $postId ?>').value;

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Reload comments after adding a new comment
                    loadComments(postId);
                } else {
                    console.error("Error adding comment");
                }
            }
        };
        xhr.onerror = function() {
            console.error("Error making the request");
        };
        xhr.open("POST", "add_comment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("postId=" + postId + "&commentText=" + encodeURIComponent(commentText));
    });

    function loadComments(postId) {
        const commentListContainer = document.getElementById('commentList' + postId);

        // Load existing comments
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const comments = JSON.parse(xhr.responseText);
                let commentsHtml = '';
                for (const comment of comments) {
                    commentsHtml += `
                        <p><strong>${comment.username}</strong> - ${comment.date}</p>
                        <p>${comment.text}</p>
                        <hr>
                    `;
                }
                commentListContainer.innerHTML = commentsHtml;
            }
        };
        xhr.open("GET", "load_comments.php?postId=" + postId, true);
        xhr.send();
    }
            }
        </script>
</body>

</html>