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

            if($type == 'song'){
                $sql = "SELECT DISTINCT Tracks.track_id, Tracks.track_name, Artist.artist_name, 
                    Album.album_name, Tracks.explicit, Tracks.track_genre, Tracks.duration_ms
            	FROM Tracks
            	JOIN Appears_on ON Tracks.track_id = Appears_on.track_id
            	JOIN Album ON Appears_on.album_id = Album.album_id
           	    JOIN Produce ON Tracks.track_id = Produce.track_id
            	JOIN Artist ON Produce.artist_id = Artist.artist_id
            	WHERE Tracks.track_name = :input";
            } else if($type =='artist'){
                $sql = "SELECT Distinct Tracks.track_id, Tracks.track_name, Artist.artist_name, 
                    Album.album_name, Tracks.track_genre, Tracks.explicit, Tracks.duration_ms 
                FROM Tracks 
                JOIN Appears_on ON Tracks.track_id = Appears_on.track_id 
                JOIN Album ON Appears_on.album_id = Album.album_id 
                JOIN Produce ON Tracks.track_id = Produce.track_id 
                JOIN Artist ON Produce.artist_id = Artist.artist_id 
                WHERE Artist.artist_name = :input";
            } else {
                $sql = "SELECT Tracks.track_name
                FROM `Tracks`
                INNER JOIN `Appears_on` ON Tracks.track_id = Appears_on.track_id
                INNER JOIN `Album` ON Appears_on.album_id = Album.album_id
                WHERE Album.album_name = :input";
            }

                                                    
            $parameterValues = array(":input" => $input);

            $returnList = getAll($sql, $db, $parameterValues);

            if(sizeof($returnList) > 0) {
                foreach($returnList as $row){
                    echo "<tr><td>{$row['track_id']}</td><td>{$row['track_name']}</td><td>{$row['artist_name']}</td><td>{$row['album_name']}</td>
                    <td>{$row['track_genre']}</td><td>{$row['explicit']}</td><td>{$row['duration_ms']}</td></tr>";
                }
            } else {
                echo "<script> alert('There is no {$type} with the name {$input}!'); </script>";
            }
        break;

        case 'filter' :                                     //checking if the type of search is for a artist

            $sort = $_POST['sort'];                         //retrieve sort value
            $genre = $_POST['genre'];                       //retrieve genre value
            $duration = $_POST['duration'];                 //retrieve duration value

            if($genre != '0'){                              //if specific genre isn't selected 

            }

            if(isset($_POST['explicit'])){                  //if explicit radio button is selected then retrieve value
                $explicit = $_POST['explicit'];
            }

            if($duration != 'any') {                        //if specific duration value is selected and not default/any

            } 
            
            $parameterValues = array();
            
            $returnList = getAll($sql, $db, $parameterValues);
            
            foreach($returnList as $row){

            }
            //$db = null;
        break;

        default :

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
