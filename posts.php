<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        .like-button {
            cursor: pointer;
        }

        .like-button:hover {
            color: red;
        }
    </style>
    <title>WeCare - Posts</title>
</head>

<body>
    <?php
    if (isset($isUser) && $isUser == 1) {
    $query = "SELECT * FROM posts WHERE memberId = '$memberId' ORDER BY date DESC";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error fetching posts: " . mysqli_error($con));
    }

    $query2 = "SELECT username FROM member WHERE memberId = '$memberId'";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
    ?>
    <div class="container mt-5 mx-auto">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $postId = $row['postId'];
            $datePosted = date("F j, Y, g:i a", strtotime($row['date']));
            $caption = $row['text'];
            $image = $row['image'];
            $likeCount = $row['likeCount'];
        ?>
            <div class="card mb-3 mx-auto" style="width: 80%">
                <div class="card-body text-center">
                    <div>
                        <h3 class="card-title float-start"><?= $row2['username'] ?></h3>
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
                        <span class="like-count" id="like-count-<?= $postId ?>"><?= $likeCount ?></span>
                    </div>
                </div>
            </div>
        <?php
        }}else{

        }
        ?>
    </div>

    <script>
        function toggleLike(likeButton) {
            const postId = likeButton.getAttribute('data-post-id');
            const likeCountElement = document.getElementById('like-count-' + postId);

            // Check if the like button is already filled
            const isLiked = likeButton.classList.contains('text-danger');

            // Toggle the like button style
            likeButton.classList.toggle('text-danger', !isLiked);

            // Update like count locally
            const currentLikeCount = parseInt(likeCountElement.textContent);
            likeCountElement.textContent = isLiked ? currentLikeCount - 1 : currentLikeCount + 1;

            // Send an AJAX request to update like count in the database
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response if needed
                }
            };
            xhr.open("POST", "update_like_count.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("postId=" + postId);
        }
    </script>
</body>

</html>
