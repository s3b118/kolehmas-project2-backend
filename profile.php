<?php include "handy_methods.php";

    // Om logout-form skickas
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
        include "model_logout.php";
        exit(); // Förhindra att resten av sidan laddas efter logout
    }

    // Om användaren är inloggad
    if (! isset($_SESSION['username'])) {
        // Redirect till defaultprofile.php om inte inloggad
        header("Location: defaultprofile.php");
        exit();
    }

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div id="container">
        <?php include "header.php"?>
        <section>

            <article>
                <h2>Profile View</h2>
                <?php include "./view_account.php"?>
            </article>

            <article>
                <h2 id="deleteAccountHeader">Delete Account</h2>
                <?php include "./view_delete.php"?>
            </article>

            <article>
                <h2>Logout</h2>
                <?php include "./view_logout.php"?>
            </article>

            <article>
                <h2>Comments</h2>
                <?php include "./view_comments.php"?>
            </article>

        </section>

    </div>

</body>

</html>