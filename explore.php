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

    <?php include("navbar2.php"); ?>
    
    <div class="py-2 w-100" style="background-color: aliceblue; height: 60px; position:fixed; z-index: 1000;">
        <form class="d-flex mx-5" role="search">
            <input class="form-control w-50 ms-5 me-3" id="txtSearch" type="text" placeholder="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>

    </div>

    <div style="margin: 20px">.</div>

    <div class="my-5 mx-5" id="result">
        <?php
        include("exploreaction.php")
        ?>
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