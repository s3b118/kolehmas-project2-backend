<?php

    include "model_likes.php";

    // Visa Like/Dislike om användaren är inloggad
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    ?>

    <form action="index.php" method="post">
        <input type="hidden" name="profile_id" value="<?php echo $row['id'] ?>">

        <button type="submit" name="like_action" value="like"
            <?php echo(isset($_SESSION['profile_likes'][$row['id']]) && $_SESSION['profile_likes'][$row['id']] === 'like') ? 'disabled' : '' ?>>
            👍 Like
        </button>

        <button type="submit" name="like_action" value="dislike"
            <?php echo(isset($_SESSION['profile_likes'][$row['id']]) && $_SESSION['profile_likes'][$row['id']] === 'dislike') ? 'disabled' : '' ?>>
            👎 Dislike
        </button>

        <?php if (isset($_SESSION['profile_likes'][$row['id']])): ?>
            <button type="submit" name="like_action" value="remove">❌ Remove</button>
        <?php endif; ?>
    </form>

    <p>Likes:              <?php echo $row['likes'] ?></p>
    <p>Dislikes:                 <?php echo isset($row['dislikes']) ? $row['dislikes'] : 0 ?></p>
    <?php
        } else {
            echo "<p>You must be logged in to like or dislike profiles. <a href='login.php'>Login here</a></p>";
    }
    ?>