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

        $mode = $_GET(['mode']);
    }

    //$search = $_POST['search'];                           //retrieving sesarch input
    //$type = $_POST['type'];                               //retrieving type of search

    switch($mode) {
    
        case 'search' :                                       //checking if case is search type

            $type = $_POST(['type']);
            $input = $_POST(['input']);

            if($type == 'song'){
                $sql = "";
            } else if($type =='artist'){
                $sql = "";
            } else {
                $sql = "";
            }

                                                  //query for song search
            $parameterValues = array(":type" => $type,
                                    ":input" => $input);

            $returnList = getAll($sql, $db, $parameterValues);

            foreach($returnList as $row){
                echo "<tr><td>Filler</td><td>{$row['track_name']}</td><td>{$row['artist_name']}</td><td>{$row['album_name']}</td>
                    <td>{$row['genre']}</td><td>{$row['explicit']}</td><td>{$row['duration_ms']}</td></tr>";
            }
            
        break;

        case 'filter' :                                     //checking if the type of search is for a artist

            $sort = $_POST(['sort']);
            $genre = $_POST(['genre']);
            $explicit = $_POST(['explicit']);
            $duration = $_POST(['duration']);

            //need to do if genre is 0, explicit isn't selected, and duration is any
            //will need to change parameterValues and sql variable

            $sql = "";                                      //query for artist search
            $parameterValues = array(":sort" => $sort,
                                    ":genre" => $genre
                                    ":explicit" => $explicit,
                                    ":duration" => $duration);
            
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
    /* Prepare the SQL statement. 
        The $db->prepare($sql) method returns an object.
    */
    $statement = $db->prepare($sql);

    /* Execute prepared statement. The execute( ) method returns a resource object.  */
    $statement->execute($parameterValues );

    /* Use the fetchAll( ) method to extract records from the result set.
    */
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

?>
?>