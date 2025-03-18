<?php
session_unset();
session_destroy();

// Redirect till login sidan
header("Location: login.php");
exit();
