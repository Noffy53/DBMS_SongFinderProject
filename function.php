<?php

//connecting to database
include('pdo_connect.php');

//Check if the database connection is established. If not, exit the program.
if (!$db) {
    echo "Could not connect to the database";
    exit();
}

$search="";
$type="";

try {

    if(isset($_POST['search'])){                        //checking if they searched button was pressed

        $search = $_POST['search'];                     //retrieving sesarch input
        $type = $_POST['type'];                         //retrieving type of search

        switch($type) {
        
            case 'song' :                                   //checking if the type of search is for a song

                $sql = "";                                  //query for song search
                $statement = $db->prepare($sql);            //preparing query

                $statement->bindValue(':search', $search);
                //$statement->bindValue(':type', $type);

                $statement->closeCursor();
                $db = null;
            break;

            case 'artist' :                            //checking if the type of search is for a artist

                $sql = "";                                  //query for artist search
                $statement = $db->prepare($sql);            //preparing query

                $statement->bindValue(':search', $search);
                //$statement->bindValue(':type', $type);

                $statement->closeCursor();
                $db = null;
            break;

            case 'album' :                             //checking if the type of search is for a album

                $sql = "";                                  //query for album search
                $statement = $db->prepare($sql);            //preparing query

                $statement->bindValue(':search', $search);
                //$statement->bindValue(':type', $type);

                $statement->closeCursor();
                $db = null;
            break;
        }
    }
    

    //ckecking if filter button was clicked
    $sort=""; 
    $genre = "";
    $explicit = "";
    $duration = "";
    if(isset($_POST['filter'])){
        $sort = $_POST['sort'];                     //gathering form data from filter 
        $genre = $_POST['genre'];
        $explicit = $_POST['explicit'];
        $duration = $_POST['duration'];

        $sql = "SELECT";
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


//checking if the used filter and if they did what do they want filtered
if(isset($_POST['filter'])){
    $sort = $_POST['sort'];
    $genre = $_POST['genre'];
    $explicit = $_POST['explicit'];
    $duration = $_POST['duration'];
}






?>