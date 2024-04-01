<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require __DIR__ . "/database.php";  // Check the path to your database.php file

    // Get values from the form
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $user_confrim_password = $_POST["user_confrim_password"];

    if (empty($user_name)) {
        die("user name fields requried");
    }
    if (empty($user_email)) {
        die("email fields requried");
    }
    if (empty($user_password)) {
        die("password fields requried");
    }
    if ($user_password !== $user_confrim_password) {
        die("password not matching");
    }
    if (strlen($user_password) < 5) {
        die("password need more than 5 charaters");
    }

   // check the existing email in data base first
    $existing_email = "SELECT * FROM users_registrations WHERE user_email= '$user_email'";
     
    if ($conn->query($existing_email)->num_rows > 0) {
        die("This Email $user_email already existing in the data base, use new email for register");
    }

    // Prepare and execute the SQL insert statement
    $sql_data_insert_string = "INSERT INTO users_registrations (user_name, user_email, user_password) 
                               VALUES ('$user_name', '$user_email', '$user_password')";

    if ($conn->query($sql_data_insert_string) === TRUE) {
        header("Location: login_page.html");
    } 

    $conn->close(); // Close the database connection
}
?>
