<?php
// Visa endast om användare är inloggad
if (! isset($_SESSION['username']) || ! isset($_SESSION['user_id'])) {
    echo "You must be logged in to like or dislike profiles.";
    exit();
}

// Like/Dislike funktionalitet
if (isset($_POST['profile_id']) && isset($_POST['like_action'])) {
    $profile_id  = $_POST['profile_id'];
    $user_id     = $_SESSION['user_id'];
    $like_action = $_POST['like_action'];

    // Check the current like/dislike state for the logged-in user in the session
    $current_action = isset($_SESSION['profile_likes'][$profile_id]) ? $_SESSION['profile_likes'][$profile_id] : null;

    // Hämtar nuvarande mängden likes för profilen ()
    $stmt = $conn->prepare("SELECT likes FROM profiles WHERE id = :profile_id");
    $stmt->bindParam(':profile_id', $profile_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (! $result) {
        echo "Profile not found.";
        exit();
    }

    $likes = (int) $result['likes'];

    // Logik för uppdatering av likes baserat på användar-input
    if ($like_action === 'like') {

        if ($current_action === 'dislike') {

            $likes += 2;
        } elseif ($current_action === null) {

            $likes += 1;
        }

        $_SESSION['profile_likes'][$profile_id] = 'like'; // Like status i session

    } elseif ($like_action === 'dislike') {
        // User clicked dislike
        if ($current_action === 'like') {

            $likes -= 2;
        } elseif ($current_action === null) {

            $likes -= 1;
        }

        $_SESSION['profile_likes'][$profile_id] = 'dislike'; // Dislike status i session

    } elseif ($like_action === 'remove') {

        if ($current_action === 'like') {

            $likes -= 1;
        } elseif ($current_action === 'dislike') {

            $likes += 1;
        }

        unset($_SESSION['profile_likes'][$profile_id]); // Tar bort like/dislike från session
    }

    // Uppdaterar "likes" i databasen
    $update_stmt = $conn->prepare("UPDATE profiles SET likes = :likes WHERE id = :profile_id");
    $update_stmt->bindParam(':likes', $likes, PDO::PARAM_INT);
    $update_stmt->bindParam(':profile_id', $profile_id, PDO::PARAM_INT);
    $update_stmt->execute();

    // Redirect till profilsidan efter like/dislike
    header("Location: index.php");
    exit();
}
