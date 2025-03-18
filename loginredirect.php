<?php

    include "handy_methods.php";

    if (! isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Already Logged In</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div id="container">
        <?php include "header.php"?>
        <section>
            <article>
                <h2>You are already logged in</h2>
                <p>You are currently logged in as: <?php echo $_SESSION['username']?>.</p>
                <a href="profile.php">Go to your profile</a> if you wish to logout and login as a different user.
            </article>
        </section>
    </div>
</body>
</html>