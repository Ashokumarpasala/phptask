<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Password Reset Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
</head>
<body style="font-family: cursive">
    <h1>Reset Password</h1>
    <form action="reset_process_password.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required />
        <label for="change_password">New Password</label>
        <input type="password" name="change_password" id="change_password" required />
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required />
        <button type="submit">Reset</button>
    </form>
</body>
</html>
