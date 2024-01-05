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

    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #121F36">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html" style="color: white;">WeCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interaction.php" style="color: white;">Interaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php" style="color: white;">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;">Create</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <form class="container-fluid justify-content-start">
                        <button class="btn btn-sm btn-primary px-2 py-1" type="button">
                            <a href="signout.php" style="text-decoration: none; color: white;">Sign Out</a>
                        </button>
                    </form>
                </span>
            </div>
        </div>
    </nav>

    <div class="py-2" style="background-color: aliceblue; height: 60px; position:fixed; z-index: 1000;">
        <form class="d-flex" role="search">
            <input class="form-control w-50" id="txtSearch" type="text" placeholder="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>

    </div>

    <div style="margin: 20px">.</div>

    <div class="my-5" id="result">
        <?php
        include("exploreaction.php")
        ?>
        Lorem ipsum dolor sit amet consectetur</br></br></br></br> adipisicing elit. Magnam minus asperiores unde delectus</br></br></br>, saepe, sunt iusto exercitationem aliquid incidunt in earum</br></br></br>! Numquam, eos dolorem beatae ex pariatur quidem corporis?</br></br> orem ipsum dolor sit amet consectetur adipisicing elit.</br></br></br> Reprehenderit dolor, repellat explicabo alias obcaecati excepturi quam, aperiam quasi provident amet</br></br></br> harum distinctio, cumque culpa corporis rem hic et doloremque
    </div>



    <script type="text/javascript">
        // bind on keyup event to the textbox search
        $(document).ready(function() { // on page load
            $('#txtSearch').keyup(function() {
                $.ajax({
                    type: "GET",
                    url: "search.php",
                    data: {
                        'name': this.value
                    },
                    success: function(response) {
                        // returned result
                        $('#result').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>