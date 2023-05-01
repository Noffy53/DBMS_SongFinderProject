<?php

//connecting to database
include('pdo_connect.php');

//Check if the database connection is established. If not, exit the program.
if (!$db) {
    echo "Could not connect to the database";
    exit();
}

$mode = "";                                                 // default value for the switch statement
$parameterValues = null;                                    // default values named parameters


try {     
    
    if(isset($_GET['mode'])){                                //checking if they searched button was pressed
        $mode = $_GET['mode'];
    }

    switch($mode) {
    
        case 'search' :                                       //checking if case is search type

            $type = $_POST['type'];
            $input = $_POST['input'];

            $sql = "SELECT DISTINCT tracks.track_id, tracks.track_name, artist.artist_name, albums.album_name, tracks.explicit, tracks.track_genre, tracks.duration_ms 
            FROM tracks 
            JOIN appears_on ON tracks.track_id = appears_on.track_id 
            JOIN albums ON appears_on.album_id = albums.album_id 
            JOIN produce ON tracks.track_id = produce.track_id 
            JOIN artist ON produce.artist_id = artist.artist_id 
            WHERE ";

            if($type == 'song'){                                //if the type of the search is song query where input is song name
                $sql .= "tracks.track_name = :input";
            } else if($type == 'artist'){                       //if the type of the search is artist query where input is artist name
                $sql .= "artist.artist_name = :input";
            } else {                                            //if the type of the search isn't song or artist, search album with input as album name
                $sql .= "albums.album_name = :input";
            }
                                                    
            $parameterValues = array(":input" => $input);

            $returnList = getAll($sql, $db, $parameterValues);

            if(sizeof($returnList) > 0) {
                foreach($returnList as $row){
                    $durationms = gmdate("i:s", ($row['duration_ms']/1000));

                    echo "<tr><td>{$row['track_id']}</td><td>{$row['track_name']}</td><td>{$row['artist_name']}</td><td>{$row['album_name']}</td>
                    <td>{$row['track_genre']}</td><td>{$row['explicit']}</td><td>{$durationms}</td></tr>";
                }
            } else {
                echo "<script> alert('There is no {$type} with the name {$input}!'); </script>";
            }
            break;

        case 'filter' :                                     //checking if the type of search is for a artist
            $explicit = null;                               //creating defualt explicit variable since radio button is optional
            $sort = $_POST['sort'];                         //retrieve sort value
            $genre = $_POST['genre'];                       //retrieve genre value
            $duration = $_POST['duration'];                 //retrieve duration value
            if(isset($_POST['explicit'])){                  //if explicit radio button is selected then retrieve value
                $explicit = $_POST['explicit'];
            }

            $sql = "SELECT DISTINCT tracks.track_id, tracks.track_name, artist.artist_name, albums.album_name, tracks.explicit, tracks.track_genre, tracks.duration_ms 
            FROM tracks
            JOIN appears_on ON tracks.track_id = appears_on.track_id
            JOIN albums ON appears_on.album_id = albums.album_id
            JOIN produce ON tracks.track_id = produce.track_id
            JOIN artist ON produce.artist_id = artist.artist_id
            WHERE ";

            // Add genre condition if selected
            if ($genre != 'none') {
                $sql .= "(tracks.track_genre LIKE '%{$genre}%') ";
            }

            // Add explicit condition if selected
            if (!is_null($explicit)) {
                if ($genre != 'none') {
                    $sql .= "AND ";
                }
                $sql .= "(tracks.explicit = '{$explicit}') ";
            }

            // Add duration condition if selected
            switch ($duration) {
                case '0-1':
                    $sql .= "AND (tracks.duration_ms <= 60000) ";
                    break;
                case '1-2':
                    $sql .= "AND (tracks.duration_ms >= 60000 AND tracks.duration_ms <= 120000) ";
                    break;
                case '2-3':
                    $sql .= "AND (tracks.duration_ms >= 120000 AND tracks.duration_ms <= 180000) ";
                    break;
                case '3-4':
                    $sql .= "AND (tracks.duration_ms >= 180000 AND tracks.duration_ms <= 240000) ";
                    break;
                case '4+':
                    $sql .= "AND (tracks.duration_ms >= 240000) ";
                    break;
            }
            
            if ($sort == 'least') {
                $sql .= "ORDER BY tracks.popularity DESC";
            } else if ($sort == 'A') {
                $sql .= "ORDER BY tracks.track_name";
            } else if ($sort == 'Z') {
                $sql .= "ORDER BY tracks.track_name DESC";
            } else {
                $sql .= "ORDER BY tracks.popularity";
            }
            
            $parameterValues = array();
            
            $returnList = getAll($sql, $db, $parameterValues);
            
            if(sizeof($returnList) > 0) {
                foreach($returnList as $row){
                    $durationms = gmdate("i:s", ($row['duration_ms']/1000));

                    echo "<tr><td>FILLER</td><td>{$row['track_name']}</td><td>{$row['artist_name']}</td><td>{$row['album_name']}</td>
                    <td>{$row['track_genre']}</td><td>{$row['explicit']}</td><td>{$durationms}</td></tr>";
                }
            } else {
                echo "<script> alert('There songs matching your filter!'); </script>";
            }

            break;

        default :
        $sql = "SELECT DISTINCT TOP (100) tracks.track_id, tracks.track_name, artist.artist_name, album.album_name, tracks.explicit, tracks.track_genre, tracks.duration_ms
        FROM tracks
        JOIN appears_on ON tracks.track_id = appears_on.track_id
        JOIN album ON appears_on.album_id = album.album_id
        JOIN produce ON tracks.track_id = produce.track_id
        JOIN artist ON produce.artist_id = artist.artist_id
        ORDER BY tracks.popularity";

        $parameterValues = array();
        $returnList = getAll($sql, $db, $parameterValues);

        if(sizeof($returnList) > 0) {
            foreach($returnList as $row){
                //$durationms = gmdate("i:s", ($row['duration_ms']/1000));

                echo "<tr><td>{$row['track_id']}</td><td>{$row['track_name']}</td><td>{$row['artist_name']}</td><td>{$row['album_name']}</td>
                    <td>{$row['track_genre']}</td><td>{$row['explicit']}</td><td>{$durationms}</td></tr>";
            }
        } else {
            echo "<script> alert('There songs matching your filter!'); </script>";
        }
        break;
    }

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


function getAll($sql, $db, $parameterValues = null){
    /* Prepare the SQL statement. The $db->prepare($sql) method returns an object.*/
    $statement = $db->prepare($sql);

    /* Execute prepared statement. The execute( ) method returns a resource object.  */
    $statement->execute($parameterValues );

    /* Use the fetchAll( ) method to extract records from the result set.*/
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

?>
