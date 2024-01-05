<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Navbar</title>
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
                        <a class="nav-link" href="index.php" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php" style="color: white;">Interaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;">About US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white;">Contact Us</a>
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
</body>
</html>