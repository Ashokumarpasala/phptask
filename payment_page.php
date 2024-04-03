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
<img src="https://upload.wikimedia.org/wikipedia/commons/b/b3/Razorpay_logo.webp" alt="">
    <?php 
    session_start();

     $api_key = "rzp_test_ZB6xypsPywN4Sp";
     if ($_SERVER["REQUEST_METHOD"] === "POST") {
         $product_id = $_POST["product_id"];
         $product_amount = $_POST["product_amount"];
         $product_img = $_POST["product_img"];
         $product_name = $_POST["product_name"];
         $product_description = $_POST["product_description"];
         
        require __DIR__. "/database.php";

        $sql = "INSERT INTO orders (product_id, product_amount, product_img, product_name) VALUES ('$product_id', '$product_amount', '$product_img', '$product_name')";
        $conn->query($sql);
        $conn->close();
     }
    ?>


    <form action="thanks.php" method="POST" enctype="multipart/form-data">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $api_key; ?>"
            data-amount="<?php echo $product_amount; ?>" 
            data-currency="INR"
            data-id="<?php echo $product_id;  ?>"
            data-buttontext="Pay with Razorpay"
            data-name="<?php echo $product_name; ?>"
            data-description="<?php echo $product_description; ?>"
            data-image="<?php echo $product_img; ?>"
            data-prefill.name="Ashok Kumar"
            data-prefill.email="ashok.kumar@example.com"
            data-theme.color="#F37254"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden"/>
        <input type="hidden" name="premimum_card_img" value="<?php echo $product_img; ?>"/>
        </form>
    <a href="home_page.php"><p>Back to home page</p></a>
</body>
</html>