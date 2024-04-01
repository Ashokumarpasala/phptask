<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    require __DIR__. '/database.php';

    $current_password = $_POST["current_password"];
    $new_password = $_POST["change_password"];
    $confrim_password = $_POST["confrim_password"];

    $user_id = $_SESSION["user_id"];

    $fetch_data = "SELECT * FROM users_registrations WHERE id= '$user_id'";
    
    $result = $conn->query($fetch_data);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $old_password = $row["user_password"];
        
        if ($current_password !== $old_password) {
            die("current passowrd not matching");
        }

        if (strlen($new_password) < 5) {
            die("new password must be above 5 charaters");
        }
    
        if ($new_password !== $confrim_password) {
            die("new password not matching");
        }


        $push_new_password = "UPDATE users_registrations SET user_password='$new_password' WHERE id='$user_id'";
        if ($conn->query($push_new_password)) {
            header("Location: login_page.html");
        } else {
            echo "password not updated $conn->error";
        }
        
    } else {
        echo "user not found";
    }






}