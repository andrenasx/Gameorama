<?php function draw_header() { ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>

        <!-- Icons CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">

        <!-- CSS -->
        <link href="../css/main.css" rel="stylesheet">

        <title>Gameorama</title>
    </head>
    <body class="d-flex flex-column min-vh-100">
<?php } ?>

<?php function draw_footer() { ?>
        <footer class="footer row g-0 mt-auto p-3 px-2 px-sm-4 bg-white d-flex justify-content-between">
                <div class="col-12 col-md-4">
                    <a class="" href="../pages/mainpage.php">Home</a>
                    <a class="ms-2" href="../pages/about.php">About Us</a>
                </div>
                
                <span class="color-orange col-12 col-md-8 text-md-end">&copy; Copyright 2021 Gameorama. All rights reserved.</span>
        </footer>
    </body>
</html>
<?php } ?>