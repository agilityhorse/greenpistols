<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])) {
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = "emails.txt";
        $entry = $email . " | " . date("Y-m-d H:i:s") . "\n";

        if (file_put_contents($file, $entry, FILE_APPEND | LOCK_EX)) {
            echo "Thanks! Your email has been saved.";
        } else {
            echo "Error: Could not save your email.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "No data received.";
}
?>
