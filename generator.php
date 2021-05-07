<?php

use Classes\pdfGenerator;

if ($_SERVER["REQUEST_METHOD"] != 'POST'){
    exit;
}

define("ACCESSCHECK", TRUE);

require_once 'vendor/autoload.php';

$formFieldNames = array_keys($_POST);

$handle = fopen("fieldNames.txt", "r");
$fieldNames = array();
while(!feof($handle)){
    $data = fgets($handle);
    array_push($fieldNames, trim($data));
}
// print_r($fieldNames);

$data = array();
for ( $i = 0; $i < count($_POST); $i++ ){

    $data[$fieldNames[$i]] = $_POST[$formFieldNames[$i]];

}

print_r($_POST);

// $data = [
//     'FillText1' => $var1,
//     'Text1' => $var2,
//     'CityCounty' => $var3,
//     'Check Box4' => $var4
// ];

// initializing the pdfGenerator class
$pdf = new pdfGenerator;
$response = $pdf->generate($data);

header('Location: landingPage.php?' . 'link=' . $response);

var_dump($response);