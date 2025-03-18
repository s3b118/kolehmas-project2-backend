<?php
// Nuvarande sida från URL, om inte definierad = 1
$page              = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$profiles_per_page = 10;

// Räknar ut startpunk för SQL query
$start_from = ($page - 1) * $profiles_per_page;

// Sortering/filtrering
$sort_by           = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'likes';
$order             = isset($_GET['order']) && $_GET['order'] === 'desc' ? 'DESC' : 'ASC';
$preference_filter = '';

// Filtrerar enligt användar-input
if (isset($_GET['preference']) && in_array($_GET['preference'], ['1', '2', '3', '4'])) {
    $preference_filter = "WHERE preference = " . (int) $_GET['preference'];
}

// SQL query för att hämta profil-detaljer
$sql = "SELECT id, username, realname, email, zipcode, bio, salary, preference, likes, role
        FROM profiles
        $preference_filter
        ORDER BY $sort_by $order
        LIMIT :start_from, :profiles_per_page";

// Databas uppkoppling finns redan i handy_methods, som inkluderas i index.php
//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Hämtar profiler för nuvarande sida
$stmt = $conn->prepare($sql);                                 //Prepared statements för skydd mot SQL injection attacker
$stmt->bindParam(':start_from', $start_from, PDO::PARAM_INT); //bindParam() för att koppla ihop $start_from till SQL-Query placeholder :start_from, som ersätts av $start_from när queryn körs. PARAM_INT för PDO att behandla :start_from som integer
$stmt->bindParam(':profiles_per_page', $profiles_per_page, PDO::PARAM_INT);
$stmt->execute(); //Exekverar prepared statement och parametrar. Skickar SQL queryn till databasen och ersätter placeholder variablerna med databasens relevanta värden

$profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Räknar ut totala antalet användare
$total_profiles_sql = "SELECT COUNT(*) FROM profiles $preference_filter";
$total_stmt         = $conn->query($total_profiles_sql);
$total_profiles     = $total_stmt->fetchColumn();

// Räknar ut totala mängden sidor
$total_pages = ceil($total_profiles / $profiles_per_page);

// Kommentarer
if (isset($_POST['submit_comment']) && ! empty($_POST['comment']) && ! empty($_POST['reply_id'])) {
    $comment  = test_input($_POST['comment']);
    $reply_id = test_input($_POST['reply_id']);

    // Om användaren är inloggad
    if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
        $sender_id = $_SESSION['user_id'];

        // Kommentarer i "comments" table
        $comment_sql  = "INSERT INTO comments (user, sender_id, comment, reply_id) VALUES (?, ?, ?, ?)";
        $comment_stmt = $conn->prepare($comment_sql);

        if ($comment_stmt->execute([$_SESSION['username'], $sender_id, $comment, $reply_id])) {
            echo "<h2 id='successfulUserInput'>Comment posted successfully!</h2>";
        } else {
            echo "<h2 id='errorOnUserInput'>Error posting the comment. Please try again.</h2>";
        }
    } else {
        echo "<h2>You must be logged in to post a comment.</h2>";
    }
}
