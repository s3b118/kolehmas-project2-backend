<?php
// Användar-id från session
$reply_id = $_SESSION['user_id'];

// Query för att hämta kommentarer som har skickats till nuvarande användare (reply_id)
$sql = "SELECT c.comment, u.username AS sender FROM comments c
        JOIN profiles u ON c.sender_id = u.id
        WHERE c.reply_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$reply_id]);

// Alla kommenterar för inloggad användare genom fetch_assoc
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
