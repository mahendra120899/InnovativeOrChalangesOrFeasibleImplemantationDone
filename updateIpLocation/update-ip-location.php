<?php
require_once('../../files/functions.php');
require_once('../../helper/custom_helper.php');

$UsersSelectStmt = $pdo->prepare('SELECT * FROM users WHERE UserIPLocation IS NULL LIMIT 50');
//$UsersSelectStmt = $pdo->prepare('SELECT * FROM users');
$UsersSelectStmt->execute();

$Count = $UsersSelectStmt->rowCount();

if($Count == 0) {
    echo "<b>Message</b> : No data found.";
    die();
}

foreach($UsersSelectStmt->fetchAll() as $row) {

    $UserID = trim($row['UserID']);
    $UserIP = trim($row['UserIPAddress']);

    $IPLocation_array = GetIPLocation($UserIP);
    if($IPLocation_array){

        $UserIPLocation = json_encode($IPLocation_array);

    }else{
        $UserIPLocation = null;
    }

    $stmt = $pdo->prepare('UPDATE users SET UserIPLocation = :UserIPLocation WHERE UserID = :UserID');

    if($stmt->execute(array(':UserID' => $UserID, ':UserIPLocation' => $UserIPLocation))){
        echo "<b>Updated User ID </b> :".$UserID;
        echo "<br>";
    }else{
        echo "<b>Problem User ID </b> :".$UserID;
        echo "<br>";
    }

}

function GetIPLocation($ip){

//trigger exception in a "try" block
    try {
//        $query = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
        if($query && $query['status'] == 'success')
        {
            return $query;

        }else{

            return false;
        }
    }

//catch exception
    catch(Exception $e) {
//        echo 'Message: ' .$e->getMessage();
        return false;
    }

}