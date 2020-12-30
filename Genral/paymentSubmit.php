<?php

$config = [
    'database_host'        => 'localhost',
    'database_username'    => 'resilenn_phpteam',
    'database_password'    => 'my_password',
    'database_name'        => 'resilenn_phpteam'
];

/* Establishing the connection */
$database = new mysqli(
    $config['database_host'],
    $config['database_username'],
    $config['database_password'],
    $config['database_name']
);

/* Debugging */
if($database->connect_error) {
    die('The connection to the database failed!');
}

/* Encoding */
$database->set_charset('utf8mb4');

// Check whether token is not empty
if(!empty($_POST['token'])){

    // Token info
    $token  = $_POST['token'];

    // Card info
    $card_num = $_POST['card_num'];
    $card_cvv = $_POST['cvv'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];

    // Buyer info
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = '555-555-5555';

    if(isset($_POST['address']) && trim($_GET['address']) !=""){
        $address_array= (array)json_decode(urldecode($_POST['address']));
//        print_r($address_array);

        $addrLine1 = $address_array['addrLine1'];
        $city = $address_array['city'];
        $state = $address_array['state'];
        $zipCode = $address_array['zipCode'];
        $country = $address_array['country'];

    }else{
        $addrLine1 = '123 Test St';
        $city = 'Columbus';
        $state = 'OH';
        $zipCode = '43123';
        $country = 'USA';
    }



    // Item info
    $itemName = 'Premium Script';
    $itemNumber = 'PS123456';
    $itemPrice = $_POST['amount'];
    $currency = 'USD';
    $orderID = 'SKA92712382139';


    // Include 2Checkout PHP library
    require_once("2checkout-php/Twocheckout.php");

    // Set API key
    Twocheckout::privateKey('B2375AD3-2224-480A-A137-EDAEA7E7866B');
    Twocheckout::sellerId('102588949');
    Twocheckout::sandbox(false);

    try {
        // Charge a credit card
        $charge = Twocheckout_Charge::auth(array(
            "merchantOrderId" => $orderID,
            "token"      => $token,
            "currency"   => $currency,
            "total"      => $itemPrice,
            "billingAddr" => array(
                "name" => $name,
                "addrLine1" => $addrLine1,
                "city" => $city,
                "state" => $state,
                "zipCode" => $zipCode,
                "country" => $country,
                "email" => $email,
                "phoneNumber" => $phoneNumber
            )
        ));

        if(file_exists("./response.txt")){
            $myfile = fopen("./response.txt", "a");
            fwrite($myfile,"\n\n".json_encode($charge));
            fclose($myfile);
        }else{
            $myfile = fopen("./response.txt", "w");
            fwrite($myfile,json_encode($charge));
            fclose($myfile);
        }

        // Check whether the charge is successful
        if ($charge['response']['responseCode'] == 'APPROVED') {

            // Order details
            $orderNumber = $charge['response']['orderNumber'];
            $total = $charge['response']['total'];
            $transactionId = $charge['response']['transactionId'];
            $currency = $charge['response']['currencyCode'];
            $status = $charge['response']['responseCode'];

            $JSONData = json_encode($charge);

            $gateway = "2checkout";

            $query = "INSERT INTO `office_transactions`(`name`,`email`,`gateway`,`transaction_id`, `amount`, `data`) VALUES ('$name','$email','$gateway', '$transactionId','$itemPrice','$JSONData');";
            $result = $database->query($query);


            $headers = [];
            $headers[] = "Content-Type: application/x-www-form-urlencoded";

            $ch = curl_init();

            $param = "key=AG03l1jj4auEju6y7JIx4Ja0iOPIBQtB&username=".$username."&amount=".$itemPrice."&transaction_id=".$transactionId."&email=".$email;

            $url = "https://isociallife.com/CardPaymentProcess.aspx";

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            curl_setopt($ch, CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_NOBODY, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($ch);

            curl_close($ch);


//            $statusMsg = '<h2>Thanks for your Order!</h2>';
//            $statusMsg .= '<h4>The transaction was successful. Order details are given below:</h4>';
////            $statusMsg .= "<p>Order ID: {$insert_id}</p>";
//            $statusMsg .= "<p>Order Number: {$orderNumber}</p>";
//            $statusMsg .= "<p>Transaction ID: {$transactionId}</p>";
//            $statusMsg .= "<p>Order Total: {$total} {$currency}</p>";

            $status = "Transaction done successfully!!!";

            $response = array(
                "status" => "success",
                "message" => "The transaction was successful. <br>Transaction ID: ".$transactionId."<br><p>Order Total: ".$total." ".$currency."</p>"
            );

            $conclusion = "Thank you.";

//            echo json_encode($response);
//            exit;
        }else{

            $status = "Transaction is pending!!!";

            $response = array(
                "status" => "error",
                "message" => "Your order is not approved."
            );

            $conclusion = "Wait for approval.";
//            echo json_encode($response);
//            exit;
        }

    } catch (Twocheckout_Error $e) {
//        $statusMsg = '<h2>Transaction failed!</h2>';
//        $statusMsg .= '<p>'.$e->getMessage().'</p>';

        $response = array(
            "status" => "error",
            "message" => $e->getMessage()
        );
        $conclusion = "Please try again.";
//        echo json_encode($response);
//        exit;

        $status = "Transaction Failed!!!";
    }

}else{
//    $statusMsg = "<p>Form submission error...</p>";

    $response = array(
        "status" => "error",
        "message" => "Token is missing."
    );

    $status = "Transaction Failed!!!";

    $conclusion = "Please try again.";

//    echo json_encode($response);
//    exit;
}

$error = $response['status'];
$message = $response['message'];


?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2checkout</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <style>
        body{
            font-family: "Roboto", Helvetica, Arial, sans-serif;
        }
        .success_alert {
            width: 500px;
            height: 400px;
            background: #f0f0f0;
            box-shadow: 0px 0px 11px 1px rgba(0, 0, 0, 0.06);
            padding: 30px 0;
            border-radius: 10px;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
        .success_alert h1 {
            text-align: center;
            font-size: 35px;
            color: #8BC34A;
            margin: 5px 0px;
        }
        .success_alert h2 {
            text-align: center;
            font-size: 24px;
            margin: 0;
        }
        .success_alert h3 {
            text-align: center;
            font-size: 26px;
            margin: 0;
            color: #009688;
            margin-top: 14px;
        }
        .success_alert p {
            text-align: center;
            font-size: 17px;
            margin: 0;
        }
        .success_gif{
            width: 40%;
            margin: 0 auto;
            display: table;
        }

        .success_body {
            font-family: "Roboto", Helvetica, Arial, sans-serif;
            background-size: cover;
            background: url(./images/payment.jpg) no-repeat center;
            background-size: cover;
            height: 100vh;
        }

        .continue_btn{
            margin: 15px auto 0;
            display: table;
            background: #03A9F4;
            color: #fff;
            text-decoration: none;
            padding: 7px 22px;
            border-radius: 4px;
        }
    </style>




</head>

<body class="success_body">

<div class="success_alert">
    <h1>Payment Status</h1>

    <?php if($error=='success'){ ?>

        <img class="success_gif" src="./images/success.gif">
        <h1><?php echo $status; ?></h1>
    <?php }else{ ?>

        <img class="success_gif" src="./images/failed.gif">
        <h1 style="color: #C33B33 !important;"><?php echo $status; ?></h1>
    <?php } ?>


    <p><?php echo $message; ?></p>
    <h3><?php echo $conclusion; ?></h3>

</div>

</body>
</html>
