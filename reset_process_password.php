<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once __DIR__ . '/database.php';

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $change_password = $_POST["change_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($email === false) {
        die("Invalid email format");
    }
    if ($change_password !== $confirm_password) {
        die("Passwords do not match, please enter the same password");
    }
    if (strlen($change_password) < 5) {
        die("Password must have at least 5 characters");
    }

    $sql = "UPDATE users_registrations SET user_password ='$change_password' WHERE user_email = '$email'";
    $result = $conn->query($sql);
    echo "Password updated successfully! <a href='login_page.html'>Login here</a>";
    $conn->close();
} else {
    echo "User details not submitted properly";
}
?>
