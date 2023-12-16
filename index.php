<?php
session_start();
$_SESSION;
?>


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
    <title>WeCare - Home</title>
</head>

<body>

    <div class="bg-img" data-bs-interval="10000">
        <img src="images/heroPageimg.jpg" class="heroPageimg d-flex w-100" style="filter: brightness(0.7);">
        <div class="carousel-caption top-0" style="height:fit-content;">
            <h1 class="carousel-text1" style="font-weight: bolder; font-family: 'Segoe UI Black';">Your Health Our
                Priority
            </h1>
            <h2 class="carousel-text2" style="font-weight: bolder; font-family: 'Segoe UI Black';font-style: italic;">
                Find, Rate, Connect</h2>
            <button class="carousel-btn btn btn-primary" style="font-weight: bold;">
                <p class="carousel-join-button">Join our team
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </p>
            </button>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html" style="color: white;">WeCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html" style="color: white;">Home</a>
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
                            <a href="signup.php" style="text-decoration: none; color: white;">Sign Up</a>
                        </button>
                        <button class="btn btn-sm btn-primary px-2 py-1" type="button">
                            <a href="signin.php" style="text-decoration: none; color: white;">Sign In</a>
                        </button>
                    </form>
                </span>
            </div>
        </div>
    </nav>

    <section class="overview ">
        <div class="container h-100 d-block align-items-center">
            <div class="row w-100 text-center fs-4">
                <div class="col-lg-1"></div>
                <div class="col-lg-2 col-4">
                    <img src="images/users.png" class="overview-img">
                    <div class="overview-text">Users</div>
                </div>
                <div class="col-lg-2 col-4">
                    <img src="images/medical-team.png" class="overview-img">
                    <div class="overview-text">Doctors</div>
                </div>
                <div class="col-lg-2 col-4">
                    <img src="images/hospital.png" class="overview-img">
                    <div class="overview-text">Hospitals</div>
                </div>
                <div class="col-lg-2 col-6">
                    <img src="images/pharmacy.png" class="overview-img">
                    <div class="overview-text">Pharmacies</div>
                </div>
                <div class="col-lg-2 col-6">
                    <img src="images/medical-lab.png" class="overview-img">
                    <div class="overview-text">Laboratories</div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>

    <section class="aboutus mt-5">
        <div class="d-block align-items-center">
            <div class="row w-100 text-center fs-4">
                <div class="col-md-6 p-0">
                    <img src="images/aboutUsHeroPageimg.jpg" style="width: 100%;" >
            </div>
            <div class="col-md-6 p-0">
                <h1 class="aboutus-title mt-2" style="font-weight: bolder; font-family: 'Segoe UI Black';">About Us</h1>
                <p class="aboutus-text w-100">Welcome to <spam style="font-weight: bold; font-family: 'Segoe UI Black';">
                        WeCare</spam>, where healthcare meets connectivity!
                    Our platform is dedicated to revolutionizing the way you navigate the world
                    of healthcare by seamlessly connecting you with Doctors, Hospitals, Pharmacies,
                    and Laboratories.</p>
                <div class="text-center">
                    <button class="aboutus-btn btn btn-primary" style="font-weight: bold;">
                        <p class="carousel-join-button">Learn more
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                        </p>
                    </button>
                </div>
            </div>
            </div>
        </div>
    </section>

    <footer class="mt-5 pt-5 pb-5" style="background-color: #121F36; color: white;">
        <div class="container">
            <div>
                <h1 style="margin-top: 10px; font-family:'Segoe UI Black';">WeCare</h1>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6">
                    <h3>Need Help?</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Doctors Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3>Are You a Professional?</h3>
                    <a href="#">Sign Up as a Professional</a>
                    <h3 class="mt-5">Are You Looking For a Professional?</h3>
                    <a href="#">Sign Up as a Member</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3>Connect With Us</h3>
                    <ul class="social-icons">
                        <li><a href="#"><img src="images/instagram.png"></a></li>
                        <li><a href="#"><img src="images/facebook.png"></a></li>
                        <li><a href="#"><img src="images/threads.png"></a></li>
                        <li><a href="#"><img src="images/twitter.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const navE1 = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY >= 56) {
                navE1.classList.add('navbar-scrolled')
            } else if (window.scrollY < 56) {
                navE1.classList.remove('navbar-scrolled');
            }
        });
    </script>

</body>

</html>