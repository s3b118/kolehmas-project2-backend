<?php include "handy_methods.php"?>
<!DOCTYPE html>

<?php
    // Redirect logged-in users to loginredirect.php
    if (isset($_SESSION['username'])) {
        header("Location: loginredirect.php");
        exit();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend 2 Login</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div id="container">
        <?php include "header.php"?>
        <section>

            <article>
                <?php include "./view_login.php"?>
            </article>

        </section>

    </div>
</body>

</html>