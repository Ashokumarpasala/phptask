<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>card_page</title>
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
		/>
        <style>
			.display {
				display: flex;
				justify-content: space-between;
				align-items: end;
			}
            .img {
                width: 150px;
            }
            .box {
                display: flex;
                flex-wrap: wrap;
            }
		</style>
</head>
<body style="font-family: cursive;">
    <h1>Fill the below Form</h1>
    <?php
    $image = $_GET["card_temp"];
     echo   "<img class='img' src='$image' alt=''>";
    ?>
    <form action="card_preview.php?card_temp=<?php echo $image; ?>" method="post">
        <label for="">Gromm's Name</label>
        <input type="text" name="g_name" id="">
        <label for="">Bride's Name</label>
        <input type="text" name="b_name" id="">
        <button>Dowload pdf</button>
    </form>
    <a href="home_page.php"><p>back to home page</p></a>
    <a href="template.php?card_temp=<?php echo $image; ?>"><p>card preview</p></a>
</body>
</html>