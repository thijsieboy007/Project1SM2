<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@1&display=swap" rel="stylesheet">
    <title>Hello, world!</title>
</head>

<body>
    <main class="container-fluid">


        <header>
            <?php
            include("./pages/navbar.php");
            ?>
        </header>

        <div class="header">
        </div>

        <!-- Content -->
        <div class="row" id="content">
            <?php
            if (isset($_GET["content"])) {
                include("./pages/" .  $_GET["content"] . ".php");
            } else {
                include("./pages/home.php");
            }
            ?>
        </div>

        <footer>
            <?php
            include("./pages/footer.php");
            ?>
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>