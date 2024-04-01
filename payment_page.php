
<?php

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51OyuEqSGup5jA9TdfOt8fr7qwF5Akl5CYHjOOxJjprj8rEU46f9jKf9DLcaSGNqaLwYnrdEFcOmL1SNOn5dfGT8p00mqVaBvP7";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/success_payment.php",
    "cancel_url" => "http://localhost/phptask/home_page.php",
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => 2000,
                "product_data" => [
                    "name" => "Wedding Card"
                ]
            ]
        ] 
    ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);