<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile_page</title>
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
		/>
        <style>
            .img {
                display: flex;
                justify-content: start;
                align-items: start;
                position: relative;
            }
        </style>
</head>
<body style="font-family: cursive;">
    <h1>My Profile</h1>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    require __DIR__ . '/./database.php';

    $user_id = $_SESSION['user_id'];

    $cur_user_data = "SELECT * FROM users_registrations WHERE id = '$user_id'";

    $result = $conn->query($cur_user_data);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found.";
    }
    $conn->close();




} else {
    echo "User ID not set in session.";
}
?>
    
    <div class="img">`
    <img style="width: 300px; height:300px; object-fit:cover; border-radius: 50%;" class="" src="<?php echo 'uploads/' . $row['user_image']; ?>" alt="">
    <!-- image for edit -->
    <a href="update_image.php">
        <img src="https://logowik.com/content/uploads/images/888_edit.jpg" style="width: 50px; height:50px;  object-fit:cover; border:5px solid white; cursor: pointer; position: relative; left:-80px; top:230px; border-radius: 50%" alt="">
    </a>
</div>

    <p>Name : <?php echo $row['user_name'] ?> </p>
    <p>Email : <?php echo $row['user_email'] ?> </p>

    <a href="logout.php"><p>logout</p></a>
    <a href="reset.html"><p>Reset password</p></a>
</body>
</html>