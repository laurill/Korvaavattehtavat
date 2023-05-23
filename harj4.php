<?php

require "dbconnection.php";
$dbcon = createDbConnection();

$sql= "INSERT INTO media_types (Name) VALUES ('foobar1')";
    $sql2 = "UPDATE media_types SET Name = 'Paivitetty' WHERE MediaTypeId = 5";

$sql3 = "INSERT INTO invoice_items (InvoiceId, TrackId, UnitPrice, Quantity) VALUES (1, 2, 3, 4)";
    $sql4 = "UPDATE invoice_items SET UnitPrice = 1000, Quantity = 1000 WHERE InvoiceId = 1 AND TrackId = 2";

    try {
        $dbcon->beginTransaction();
    
        // Execute
        $dbcon->exec($sql);
        $dbcon->exec($sql2);
        $dbcon->exec($sql3);
        $dbcon->exec($sql4);
    
        $dbcon->commit();
    
        // Successful
        echo "All Gucci";
    } catch (PDOException $e) {
        // Error
        echo "Error: " . $e->getMessage();
    }
    
    $dbcon = null;

?>