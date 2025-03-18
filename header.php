

<header>
    <!-- Logo och meny i headern -->
    <img src="./media/logo.svg" alt="Website logo" />
    <div id="logo">Backend Project 2</div>

    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./register.php">Register</a></li>
            <li><a href="./report.php">Report</a></li>
            <?php
                // Om användarne är inloggad via SESSION()
                if (isset($_SESSION['username'])) {

                    $currentPage = basename($_SERVER['PHP_SELF']); // Namnet för nuvarande sida

                    if ($currentPage === 'profile.php') {
                        // Om redan i profile.php, visa endast användarnamnet utan länk
                        print("<li><strong>" . htmlspecialchars($_SESSION['username']) . "'s Profile</strong></li>");
                    } else {
                        // Om inte i profile.php, visa en länk till profilen
                        print("<li><a href='./profile.php'>" . htmlspecialchars($_SESSION['username']) . "'s Profile</a></li>");
                    }
                } else {
                    // Om inte inloggad, visa en ospecifik profilsida
                    print("<li><a href='./profile.php'>Profile</a></li>");
                }
            ?>
        </ul>
    </nav>
</header>