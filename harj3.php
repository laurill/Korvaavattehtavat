<?php

require "dbconnection.php";
$dbcon = createDbConnection();
$data = array();

$birthDate = '1970-01-01'; // BirthDate vuoden 1970 jälkeen
$reportsTo = 5; // ReportsTo enemmän kuin 5

// SQL query
$sql = "SELECT * FROM employees WHERE BirthDate > ? AND ReportsTo > ?";

$statement = $dbcon->prepare($sql);
$statement->bindParam(1, $birthDate);
$statement->bindParam(2, $reportsTo);

// Execute the query
if ($statement->execute()) {
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Haku onnistui
    $data['employees'] = $results;
    $data['message'] = "<br>Haku onnistui.";
} else {
    // Haku epäonnistui
    $data['message'] = "<br>Haku epäonnistui.";
}

$json = json_encode($data);
echo $json;
