<p>Comments on your profile:</p>

<?php include "model_comments.php"?>

<?php
    // Foreach-loop för att visa varje kommentar
    if (! empty($comments)) {
        foreach ($comments as $comment) {
            echo "<p><strong>" . htmlspecialchars($comment['sender']) . ":</strong> " . htmlspecialchars($comment['comment']) . "</p>";
        }
    } else {
        echo "<p>No comments on your profile yet.</p>";
}
?>