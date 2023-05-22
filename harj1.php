<?php

// <?php

// require "dbconnection.php";
// $dbcon = createDbConnection();

$albumTitle1 = 'Graduation';
$albumTitle2 = 'Whole Lotta Red';
$albumArtistId1 = 1;
$albumArtistId2 = 2;

// // Lisää johonkin tauluun kaksi uutta riviä koodilla.
// $sql = "INSERT INTO albums (Title, ArtistId) VALUES (?, ?), (?, ?)";

// $statement1 = $dbcon->prepare($sql);
// $statement1->bindParam(1, $albumTitle1);
// $statement1->bindParam(2, $albumArtistId1);
// $statement1->bindParam(3, $albumTitle2);
// $statement1->bindParam(4, $albumArtistId2);
// $statement1->execute();
// 


require "dbconnection.php";
$dbcon = createDbConnection();

// Tarkistetaan, onko POST-pyyntö lähetetty
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Tarkistetaan, ovatko tarvittavat parametrit saatavilla
    if (isset($_POST['Title1'], $_POST['Title2'], $_POST['ArtistId1'], $_POST['ArtistId2'])) {
        $albumTitle1 = $_POST['Title1'];
        $albumTitle2 = $_POST['Title2'];
        $albumArtistId1 = $_POST['ArtistId1'];
        $albumArtistId2 = $_POST['ArtistId2'];

        // Lisää johonkin tauluun kaksi uutta riviä koodilla.
        $sql = "INSERT INTO albums (Title, ArtistId) VALUES (?, ?), (?, ?)";

        $statement1 = $dbcon->prepare($sql);
        $statement1->bindParam(1, $albumTitle1);
        $statement1->bindParam(2, $albumArtistId1);
        $statement1->bindParam(3, $albumTitle2);
        $statement1->bindParam(4, $albumArtistId2);

        // Suorita kysely
        if ($statement1->execute()) {
            // Lisäys onnistui
            echo "Kaksi uutta riviä lisätty!";
        } else {
            // Lisäys epäonnistui
            echo "Virhe!";
        }
    } else {
        // Tarvittavat parametrit puuttuvat
        echo "Puutteita!";
    }
}

?>
