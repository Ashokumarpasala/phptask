<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Home_page</title>
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
                object-fit: cover;
                border-radius: 10px;
            }
            .box {
                display: flex;
                flex-wrap: wrap;
            }
            .space {
                margin: 10px;
            }
		</style>
	</head>

	<body style="font-family: cursive">
		<div class="display">
			<h1>Home Page</h1>
            <div class="display">

                <p style="margin: 0px 10px;">
                    <a href="profile.php">profile</a>
                </p>
                <p style="margin: 0px 10px;">
                    <a href="contact_us.html">contact us</a>
                </p>
            </div>
		</div> <hr>
        <div class="box">

            <?php
        $images_arry = [
            "https://trbahadurpur.com/wp-content/uploads/2022/11/wedding-invitation-card-design.jpg",
            "https://drevio.b-cdn.net/wp-content/uploads/2022/04/7-Lovely-Red-Floral-Gold-Wedding-Invitation-Templates-Two.jpg",
            "https://i.pinimg.com/736x/3c/ed/cd/3cedcdf82dcafd77add660a6da43070e.jpg",
            "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/wedding-invitation-card-design-template-cb34f706032647a2ed29fadb8cdabf79_screen.jpg?ts=1699921819",
        ];
        foreach ($images_arry as $value) {
            echo "
            <div class='space'>
            <a href='card.php?card_temp=" . $value . "'>
            <img class='img' src='$value' alt=''>
            </a>
            </div>
            ";
        }
        ?>
        </div>
                <form method="post" action="payment_page.php">
            <div style="display: flex; font-size:14px;">
                <div>
                    <p style="font-weight: bold;">Get this card</p>
                    <button class="b-shadow" style=" padding: 10px 15px; margin : 10px 0px; border-radius: 5px;"> <strong> <?php echo "pay-\$\t 20.00"; ?></strong></button>
                    <p>1.A well-designed wedding card reflects the couple's brand image and sets the tone for their wedding event. 
                        <br> <br>2.A professionally designed wedding card contributes to the overall aesthetic and ambiance of the wedding, creating a cohesive and memorable experience for guests.</p>                   
                    </div>
                    <div >
                        <img style="width: 100%;" src="https://www.happywedding.app/blog/wp-content/uploads/2023/06/Wedding-Invitation-Card-Design.jpg" alt="">
                    </div>
                </div>
            </form>
	</body>
</html>
