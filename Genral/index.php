<?php

//$name = $_GET['name'];
//$email = $_GET['email'];
//$str_address = $_GET['address'];
//$_GET['amount'] =10;
if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['address']) && trim($_GET['name']) !="" && trim($_GET['email']) !="" && trim($_GET['address']) !=""){
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

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <style>
            body{
                font-family: "Roboto", Helvetica, Arial, sans-serif;
            }
            .success_alert {
                width: 500px;
                height: auto;
                background: #f0f0f0;
                box-shadow: 0px 0px 11px 1px rgba(0, 0, 0, 0.06);
                padding: 30px;
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
        <h1>2checkout Payment</h1>

        <div class="row">
            <div class="col-md-12">
                <!-- credit card form -->
                <form id="paymentFrm" method="post" action="paymentSubmit.php">
                    <div class="form-group">
                        <label>NAME</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $_GET['name']; ?>" placeholder="Enter name" required autofocus>
                        <input type="hidden" class="form-control" name="username" id="username" value="<?php echo $_GET['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label>EMAIL</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $_GET['email']; ?>" placeholder="Enter email" required>
                    </div>

                    <div class="form-group">
                        <!--                    <label>ADDRESS</label>-->
                        <input type="hidden" class="form-control" name="address" id="address" value="<?php echo $_GET['address']; ?>" placeholder="Enter email" required>
                    </div>

                    <div class="form-group">
                        <label>AMOUNT</label>
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>CARD NUMBER</label>
                        <input type="text" class="form-control" name="card_num" id="card_num" placeholder="Enter card number" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label><span>EXPIRY DATE</span></label>
                        <input type="number" class="form-control" name="exp_month" id="exp_month" placeholder="MM" required>
                        <input type="number" class="form-control" name="exp_year" id="exp_year" placeholder="YY" required>
                    </div>
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="number" class="form-control" name="cvv" id="cvv" autocomplete="off" required>
                    </div>

                    <!-- hidden token input -->
                    <input id="token" name="token" type="hidden" value="">

                    <!-- submit button -->
                    <input type="submit" id="sub-button" class="btn btn-success" value="Submit Payment">
                </form>
            </div>
        </div>


    </div>


    <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


    <script>
        // Called when token created successfully.
        var successCallback = function(data) {

//        $('#sub-button').removeAttr('disabled');
//        $('#sub-button').val('Submit');

            var myForm = document.getElementById('paymentFrm');

            // Set the token as the value for the token input
            myForm.token.value = data.response.token.token;

            // Submit the form
            myForm.submit();
        };

        // Called when token creation fails.
        var errorCallback = function(data) {

            $('#sub-button').removeAttr('disabled');
            $('#sub-button').val('Submit');

            if (data.errorCode === 200) {
                tokenRequest();
            } else {
                alert(data.errorMsg);
            }
        };

        var tokenRequest = function() {

//        alert(12);
            // Setup token request arguments
            var args = {
                sellerId: "102588949",
                publishableKey: "5368DC43-E691-4E20-BE49-EBEBFC816D79",
                ccNo: $("#card_num").val(),
                cvv: $("#cvv").val(),
                expMonth: $("#exp_month").val(),
                expYear: $("#exp_year").val()
            };

            // Make the token request
            TCO.requestToken(successCallback, errorCallback, args);
        };

        $(function() {
            // Pull in the public encryption key for our environment
            TCO.loadPubKey('production');

            $("#paymentFrm").submit(function(e) {
                e.preventDefault();

                $('#sub-button').attr('disabled',true);
                $('#sub-button').val('Please wait...');
//            alert(12);
                // Call our token request function
                tokenRequest();

                // Prevent form from submitting
                return false;
            });
        });
    </script>
    </body>
    </html>

    <?php
    exit;
}else{
    echo "Parameters Required";
}






//$str_address ="%7b%22addrLine1%22%3a%22Broadway%22%2c%22city%22%3a%22New+York%22%2c%22state%22%3a%22New+York%22%2c%22zipCode%22%3a%2210001%22%2c%22country%22%3a%22USA%22%7d";

// $address_array= (array)json_decode(urldecode($str_address));
// print_r($address_array);
// print_r($address_array['addrLine1']);

?>

