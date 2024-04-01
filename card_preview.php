<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require __DIR__. '/vendor/autoload.php';
    
    $image = $_GET["card_temp"];
    $g_name = $_POST["g_name"];
    $b_name = $_POST["b_name"];
    $pdf_content = "
 <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>card_preview</title>
            <style>
                .bg {
                    background-image: url( '$image');
                    background-size: contain;
                    background-repeat: no-repeat;
                    width: 350px ;
                    height: 650px;
                    margin: auto;
                    padding: 20px;
                }
            </style>
        </head>
        <body style='font-family: cursive;'>
            <div class='bg' >
            <h1>Marrige Invitation </h1>
            <p>Dear frirends & relatives</p>
            <p>“Dear [Family Members Name], our joy will be complete with your presence on our big day.”
                “Family is where life begins and love never ends. Please join us as we unite in love and family.”
                “To our beloved family, your love and support have brought us here. Please celebrate our love story with us.”
            </p>
            <p>Gromm's Name : $g_name</p>
            <h1>wed's</h1>
            <p>Bride's Name : $b_name</p>

            </div>

        </body>
        </html>


    ";
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->AddPage();
    $pdf->writeHTML($pdf_content, true, false, true, false, '');
    $pdf->Output("marriage_invitation.pdf", "I");

    $output = $pdf->output();
    file_put_contents("marriage_invitation_local.pdf", $output);
    
    exit;
}

?>

<!--   <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>card_preview</title>
            <style>
                .bg {
                    background-image: url('<?php echo $image; ?>');
                    background-size: contain;
                    background-repeat: no-repeat;
                    width: 350px ;
                    height: 650px;
                    margin: auto;
                    padding: 20px;
                }
            </style>
        </head>
        <body style='font-family: cursive;'>
            <a href='card.php?card_temp=<?php echo $image; ?>'><p>back to card page</p></a>
            <div class='bg' >
            <h1>Marrige Invitation </h1>
            <p>Dear frirends & relatives</p>
            <p>“Dear [Family Members Name], our joy will be complete with your presence on our big day.”
                “Family is where life begins and love never ends. Please join us as we unite in love and family.”
                “To our beloved family, your love and support have brought us here. Please celebrate our love story with us.”
            </p>
            <p>Gromm's Name : <?php echo $ee; ?></p>
            <h1>wed's</h1>
            <p>Bride's Name : <?php echo $eb_name; ?></p>

            </div>

        </body>
        </html> -->