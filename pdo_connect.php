<?php
$user = 'hoffmannh21';
$pass = 'nh8718'; 
$dsn='mysql:host=washington.uww.edu;dbname=cs366-2231_hoffmannh21';

//trying connection
try {
    $db = new PDO($dsn, $user, $pass);
    //connection success return message
    echo "Established Connection <br>";

    //catching exception errors
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br>";
    die();
}

?>