<?php
if (! empty($_POST['password']) && ! empty($_POST['confirm_password'])) {

    $password         = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);

    // Om båda lösenorden stämmer
    if ($password !== $confirm_password) {
        echo("<h3>Passwords do not match. Please try again.</h3>");
        return;
    }

    $username = $_SESSION['username'];

    // Användarinfo från databas
    $sql  = "SELECT passhash FROM profiles WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Användar input stämmer med pass-hash
        if (password_verify($password, $row['passhash'])) {
            // Om korrekt lösenord
            $sql_delete  = "DELETE FROM profiles WHERE username = ?";
            $stmt_delete = $conn->prepare($sql_delete);

            if ($stmt_delete->execute([$username])) {
                // Konto raderat, session_destroy() och redirect
                session_destroy();
                echo("<h2>Your account has been deleted successfully. Redirecting to the homepage...</h2>");
                header("Refresh:3; url=index.php"); // Redirect after 3 sekunder
            } else {
                echo("<h2 id='errorOnUserInput'>Error deleting your account. Please try again.</h2>");
            }
        } else {
            echo("<h2 id='errorOnUserInput'>Incorrect password. Please try again.</h2>");
        }
    } else {
        echo("<h2 id='errorOnUserInput'>User not found. Please try again.</h2>");
    }
}
