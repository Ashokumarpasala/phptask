<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require __DIR__. "/database.php";

    $user_id = $_SESSION['user_id'];

    $image = $_FILES["change_img"]["name"];

    $image_path = "uploads/.".basename($image);

    move_uploaded_file($_FILES["change_img"]["tmp_name"], $image_path);

    $sql = "UPDATE users_registrations SET user_image='$image' WHERE id='$user_id'";

    $conn->query($sql);
    $conn->close();
    header("Location: profile.php");
}
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile_image_change</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body style="font-family: cursive;">
    <h1>change profile image</h1>
     <form action="" method="post" enctype="multipart/form-data">
        <p>choose Any one Image</p>
        <input type="file" name="change_img">
        <button>change image</button>
     </form>
     <a href="profile.php">back to profile page</a>
</body>
</html>