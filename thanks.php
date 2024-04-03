<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
		/>
</head>
<body style="font-family: cursive;">
    <h1>payment sucess</h1>
    <?php 
           if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $card_image = $_POST['premimum_card_img'];
           }
    ?>
    <a href="card.php?card_temp=<?php echo urldecode($card_image); ?>"><p>Get your premium wedding card</p></a>
</body>
</html>