

<header>
    <!-- Logo and menu in the header -->
    <img src="./media/logo.svg" alt="Website logo" />
    <div id="logo">Backend Project 2</div>

    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./login.php">Login</a></li>
            <li><a href="./register.php">Register</a></li>
            <li><a href="./report.php">Report</a></li>
            <?php
                // Check if user is logged in via session
                if (isset($_SESSION['username'])) {
                                                                   // Check if the current page is profile.php
                    $currentPage = basename($_SERVER['PHP_SELF']); // Get the name of the current page

                    if ($currentPage === 'profile.php') {
                        // If we are already on profile.php, just display username without link
                        print("<li><strong>" . htmlspecialchars($_SESSION['username']) . "'s Profile</strong></li>");
                    } else {
                        // If not on profile.php, display the link to profile
                        print("<li><a href='./profile.php'>" . htmlspecialchars($_SESSION['username']) . "'s Profile</a></li>");
                    }
                } else {
                    // If not logged in, show a generic "Profile" link
                    print("<li><a href='./profile.php'>Profile</a></li>");
                }
            ?>
        </ul>
    </nav>
</header>