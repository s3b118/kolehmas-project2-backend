<?php
    include "handy_methods.php";

    // Redirect för inloggade användare till RegisterRedirect.php
    if (isset($_SESSION['username'])) {
        header("Location: registerredirect.php");
        exit();
    }
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend 2 Register</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div id="container">
        <?php include "header.php"?>
        <section>

            <article>
                <?php include "./view_register.php"?>
            </article>

        </section>

    </div>
</body>

</html>