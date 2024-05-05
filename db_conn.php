<?php
//Define variable to where the database file is
$dbFile = '/var/www/html/zubaira/phpliteadmin/db/zubaira-b6054d493b49.db';

try {
    $db = new PDO("sqlite:$dbFile");
    //set the PDO error mode to exception
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo " ";
} catch(PDOException $e) {
  echo "" . $e->getMessage();
}

?>