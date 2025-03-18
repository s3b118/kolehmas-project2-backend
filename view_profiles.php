<h2>Ads</h2>
<p>The following profiles are posted on the site:</p>

<?php include "model_profiles.php"?>

<?php if (isset($_SESSION['username']) && isset($_SESSION['user_id'])): ?>
    <!-- Sortering enligt stigande och sjunkande -->
    <form action="index.php" method="get">
        <label for="sort_by">Sort by:</label>
        <select name="sort_by" id="sort_by">
            <option value="likes" <?php echo(isset($_GET['sort_by']) && $_GET['sort_by'] == 'likes') ? 'selected' : '' ?>>Likes</option>
            <option value="salary" <?php echo(isset($_GET['sort_by']) && $_GET['sort_by'] == 'salary') ? 'selected' : '' ?>>Salary</option>
            <option value="preference" <?php echo(isset($_GET['sort_by']) && $_GET['sort_by'] == 'preference') ? 'selected' : '' ?>>Preference</option>
        </select>

        <label for="order">Order:</label>
        <select name="order" id="order">
            <option value="asc" <?php echo(isset($_GET['order']) && $_GET['order'] == 'asc') ? 'selected' : '' ?>>Ascending</option>
            <option value="desc" <?php echo(isset($_GET['order']) && $_GET['order'] == 'desc') ? 'selected' : '' ?>>Descending</option>
        </select>

        <!-- Filter för preferens -->
        <label for="preference">Filter by Preference:</label>
        <select name="preference" id="preference">
            <option value="">All</option>
            <option value="1" <?php echo(isset($_GET['preference']) && $_GET['preference'] == '1') ? 'selected' : '' ?>>1</option>
            <option value="2" <?php echo(isset($_GET['preference']) && $_GET['preference'] == '2') ? 'selected' : '' ?>>2</option>
            <option value="3" <?php echo(isset($_GET['preference']) && $_GET['preference'] == '3') ? 'selected' : '' ?>>3</option>
            <option value="4" <?php echo(isset($_GET['preference']) && $_GET['preference'] == '4') ? 'selected' : '' ?>>4</option>
        </select>

        <input type="submit" value="Apply">
    </form>
<?php endif; ?>

<?php
    // Visar profiler baserat på login-status
    if (! empty($profiles)) {
        foreach ($profiles as $row) {
            // Visar alltid användarnamn
            echo("<h3>" . $row['username'] . "'s profile:</h3>");

            // Ytterligare detaljer för inloggade användare
            if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
                echo("<p>Bio: " . $row['bio'] . "</p>");
                echo("<p>Email: " . $row['email'] . "</p>");
                echo("<p>Zipcode: " . $row['zipcode'] . "</p>");
                echo("<p>Salary: " . $row['salary'] . "</p>");
                echo("<p>Preference: " . $row['preference'] . "</p>");
                echo("<p>Likes: " . $row['likes'] . "</p>");
                echo("<p>Role: " . $row['role'] . "</p>");

                include "view_likes.php";

                // Kommentarer
            ?>
        <form action="index.php" method="post">
            <input type="text" name="comment" placeholder="Write a comment">
            <input type="hidden" name="reply_id" value="<?php echo $row['id'] ?>">
            <input type="submit" name="submit_comment" value="Comment">
        </form>
        <?php
            } else {
                        // Föreslår login för detaljer
                        echo("<p>To view more details, please <a href='login.php'>login</a>.</p>");
                    }

                    // Admin funktionalitet placeholder
                    if (! empty($_SESSION['role']) && $_SESSION['role'] == "admin") {
                        echo("<span><a href='admin.php?profile=" . $row['id'] . "'>Edit</a></span>");
                    }
                }
            } else {
                echo("<p>No profiles are available at the moment.</p>");
            }
        ?>

<!-- Paginering -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="index.php?page=<?php echo $page - 1 ?>">Previous</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="index.php?page=<?php echo $i ?>"<?php echo $i == $page ? 'class="active"' : '' ?>><?php echo $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $total_pages): ?>
        <a href="index.php?page=<?php echo $page + 1 ?>">Next</a>
    <?php endif; ?>
</div>