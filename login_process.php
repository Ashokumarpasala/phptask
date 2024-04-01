<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require __DIR__. "/database.php";

    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    if (empty($user_email)) {
        die("email fields requried");
    }
    if (empty($user_password)) {
        die("password fields requried");
    }
    if (strlen($user_password) < 5) {
        die("password need more than 5 charaters");
    }

    $real_email = $conn->real_escape_string($user_email);

    $get_data_from_db =  "SELECT * FROM users_registrations WHERE user_email= '$real_email'";
    
    $result =  $conn->query($get_data_from_db);

    $row = $result->fetch_assoc();
    if ($user_email !== $row["user_email"]) {
        
        die("Invalid Email or Email not Found");
    }
    if ($user_password !== $row["user_password"]) {
        die("Invalid password or Wrong Password");
    } 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['user_email'];

    header("Location: home_page.php");
    
    $conn->close();
}