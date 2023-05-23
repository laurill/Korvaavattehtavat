<?php

require "dbconnection.php";
$dbcon = createDbConnection();
$data = array();

$birthDate = '1970-01-01'; // BirthDate 1970-01-01 jälkeen
$reportsTo = 5; // ReportsTo enemmän kuin 5

/* harj3.php: Hae jostain taulusta kahdella eri hakuehdolla tietoja (sama sql-komento).
(Esim. asiakkaat jotka alkavat a-kirjaimella ja ovat tietystä kaupungista, mutta älä käytä juuri tätä esimerkkiä). 
Hakuarvot tulee olla koodissa muuttujina ja ne annetaan parametreina queryyn. Palauta haun tulokset responsena (esim. json). */
$sql = "SELECT * FROM employees WHERE BirthDate > ? AND ReportsTo > ?";

$statement = $dbcon->prepare($sql);
$statement->bindParam(1, $birthDate);
$statement->bindParam(2, $reportsTo);

// Execute
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

?>