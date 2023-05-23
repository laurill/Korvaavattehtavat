<?php


// // require "dbconnection.php";
// // $dbcon = createDbConnection();

// $albumTitle1 = 'Graduation';
// $albumTitle2 = 'Whole Lotta Red';
// $albumArtistId1 = 1;
// $albumArtistId2 = 2;

// // // Lisää johonkin tauluun kaksi uutta riviä koodilla.
// // $sql = "INSERT INTO albums (Title, ArtistId) VALUES (?, ?), (?, ?)";

// // $statement1 = $dbcon->prepare($sql);
// // $statement1->bindParam(1, $albumTitle1);
// // $statement1->bindParam(2, $albumArtistId1);
// // $statement1->bindParam(3, $albumTitle2);
// // $statement1->bindParam(4, $albumArtistId2);
// // $statement1->execute();


require "dbconnection.php";
$dbcon = createDbConnection();


if (isset($_POST['Title1'], $_POST['Title2'], $_POST['ArtistId1'], $_POST['ArtistId2'])) {
    $albumTitle1 = $_POST['Title1'];
    $albumTitle2 = $_POST['Title2'];
    $albumArtistId1 = $_POST['ArtistId1'];
    $albumArtistId2 = $_POST['ArtistId2'];

    // Prepare
    $sql = "INSERT INTO albums (Title, ArtistId) VALUES (?, ?), (?, ?)";
    $statement1 = $dbcon->prepare($sql);

    // Bind parameters
    $statement1->bindParam(1, $albumTitle1);
    $statement1->bindParam(2, $albumArtistId1);
    $statement1->bindParam(3, $albumTitle2);
    $statement1->bindParam(4, $albumArtistId2);

    // Execute
    if ($statement1->execute()) {
        echo "Kaksi uutta riviä lisätty!";
    } else {
        echo "Virhe!";
    }
} else {
    echo "Tarvittavat parametrit puuttuvat!";
}

    // https://prnt.sc/VBAoaplJJuhA
    //
    // Key: Title1, Value: Graduation
    // Key: Title2, Value: Whole Lotta Red
    // Key: ArtistId1, Value: 1
    // Key: ArtistId2, Value: 2