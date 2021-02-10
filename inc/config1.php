<?php $dsn = 'mysql:host=localhost;dbname=project'; // define host name and database name
    $username = 'root'; // define the username
    $pwd=''; // password
    try {
        $db = new PDO($dsn, $username, $pwd);
    }
    catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "this is displayed because an error was found";
        exit();
}?>