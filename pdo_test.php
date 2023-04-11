<?php

include('pdo_connect.php');

// check for db connection
if(!isset($db)) {
    echo "Could not connect";
    die(); 
}

?>