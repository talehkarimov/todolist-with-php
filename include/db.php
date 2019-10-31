<?php
// variable for PDO class
$host = "localhost";
$db_name = "todo-list";
$username = "root";
$password = "";

//connect to database
try {
    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, 
                    $username, $password );
    $pdo -> exec("SET CHARACTER SET utf8");
    }

catch(PDOException $e)
    {
    echo  $e->getMessage();

   exit(); 
    }
?>
