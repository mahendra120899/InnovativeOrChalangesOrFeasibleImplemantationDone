<?php
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.zohoapis.com/crm/v2/Tasks');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
//        $post = array(
//            'file' => '@' .realpath('newlead.json')
//
//        );
$post = array('Subject' => "test with activity");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$headers = array();
$headers[] = 'Authorization: Zoho-oauthtoken 1000.8e438101356488cf8d086b38fc6b54ee.f67dad22a569131e670c466faa685063';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

print_r($result);
die;




















$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://invoice.zoho.com.au/api/v3/invoices');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ['JSONString'=>'{
    "customer_id": 17231000000207008,
    "contact_persons": [
        "982000000870911",
        "982000000870915"
    ],
    "account_id":"7000441917",
    "invoice_number": "INV-00003",
    "reference_number": " ",
    "date": "2020-11-18",
    "due_date": "2013-12-03",
    "discount": 0,
    "is_discount_before_tax": true,
    "discount_type": "item_level",
    "is_inclusive_tax": false,
    "exchange_rate": 1,
    "recurring_invoice_id": " ",
    "invoiced_estimate_id": " ",
    "salesperson_name": " ",
    "line_items": [
        {
            "item_id": 982000000030049,
        }
    ],
    "allow_partial_payments": true,
    "custom_body": " ",
    "custom_subject": " ",
    "notes": "Looking forward for your business.",
    "terms": "Terms & Conditions apply",
    "shipping_charge": 0,
    "adjustment": 0,
    "adjustment_description": " ",
    "reason": " "
}']);
$headers = array();
$headers[] = 'Authorization: Zoho-oauthtoken 1000.a662d44be6d03aa680851cdffe38747e.ac5c14655c454af37789144c7a76c01b';
$headers[] = 'X-Com-Zoho-Invoice-Organizationid: 7000664627';
$headers[] = 'Content-Type: multipart/form-data';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
print_r($result);
curl_close($ch);