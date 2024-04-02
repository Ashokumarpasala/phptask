<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    print_r($_POST);
    require __DIR__ . "/database.php";  

    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $user_confrim_password = $_POST["user_confrim_password"];

    $image_upload = $_FILES["user_image"]["name"];
    $target_file = "uploads/".basename($image_upload);
    
    move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file);

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

    $existing_email = "SELECT * FROM users_registrations WHERE user_email= '$user_email'";
     
    if ($conn->query($existing_email)->num_rows > 0) {
        die("This Email $user_email already existing in the data base, use new email for register");                                                                                                        
    }

    $sql_data_insert_string = "INSERT INTO users_registrations (user_name, user_email, user_password, user_image) 
                               VALUES ('$user_name', '$user_email', '$user_password', '$image_upload')";

    if ($conn->query($sql_data_insert_string) === TRUE) {
        header("Location: login_page.html");
    } 

    $conn->close();
}
?>
