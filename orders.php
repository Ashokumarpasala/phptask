<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
		/>
        <style>
            .wrap {
                display: flex;
                justify-content: space-between;
                 border:2px solid lightgrey;
                 margin: 5px;
            }
        </style>
</head>
<body style="font-family: cursive;">
    <h1>Wedding Cards You Purchased</h1>
    <a href="profile.php"><p>back to profile page</p></a>
    <?php 
    require __DIR__. "/database.php";
    
    if ($conn) {
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $orders_count = $result->num_rows;
            echo "<p>You have purchased $orders_count wedding cards.</p>";
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="wrap">
                    <div style="padding: 20px; display:flex">
                        <p><img src="<?php echo $row['product_img']; ?>" alt="Card Image" style="width: 200px;"></p>
                        <div style="margin: 5px;">

                            <p>ORDER_ID: <strong><?php echo $row['product_id']; ?></strong> 
                        </p>
                        <p>ORDER_AMOUNT: <strong><?php echo $row['product_amount']/100 .'/- Rupees'; ?></strong> </p>
                    </div>
                </div>
                <div style="padding: 15px;">
                    <p><?php echo $row["date_time"]; ?></p>
                </div>
                </div>
                <?php
            }
        } else {
            echo "No orders found.";
        }
        $conn->close();
    } else {
        echo "Database connection error.";
    }
    ?>
</body>

</html>