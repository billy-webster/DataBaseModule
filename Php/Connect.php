<?php

$db = new SQLite3("C:\Users\billy\Documents\Database\Database.db");
if ($db) {

    echo "Database is successfully connected";
    
    }
    
else{
    
    echo "Fail to connect the database";
    
    }

?>