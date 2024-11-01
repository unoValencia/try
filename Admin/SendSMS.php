<?php
session_start();

include("../connections.php");
include("nav.php");

require __DIR__ . '/../vendor/autoload.php';


$apiKey = "bbafbbf5817f517f28b75d7e632caeef-7d08686d-2e39-4398-92ad-5264a4fa55bd";
$url = 'https://api.infobip.com/sms/2/text/advanced';


$message = "si ten, eto na patapos na!"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST["phoneNumber"];

    $formattedPhoneNumber = preg_replace('/^0/', '+63', $phoneNumber);

    $request = new HTTP_Request2();
    $request->setUrl($url);
    $request->setMethod(HTTP_Request2::METHOD_POST);
    $request->setConfig(array(
        'follow_redirects' => TRUE
    ));
    $request->setHeader(array(
        'Authorization' => 'App ' . $apiKey,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
    ));

    $requestBody = json_encode([
        'messages' => [
            [
                'destinations' => [
                    ['to' => $formattedPhoneNumber] 
                ],
                'from' => 'Uno', 
                'text' => $message 
            ]
        ]
    ]);

    $request->setBody($requestBody);

    try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            echo 'SMS Message sent successfully!';
        } else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' . $response->getReasonPhrase();
        }
    } catch (HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<br>
<br>

<hr>

<form method="POST">

    <h1>Phone Number</h1>

    <input type="text" name="phoneNumber" required placeholder="Phone Number">

    <button class="btnSend">Send</button>


</form>
