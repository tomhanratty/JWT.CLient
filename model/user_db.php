<?php

require 'JWTClient.php';

function loginUser($userName, $password) {
    global $db;
    $query = "SELECT * FROM users "
            . "WHERE username = :username "
            . "AND password = :password ";
    $statement = $db->prepare($query);
    $statement->bindParam(':username', $userName);
    $statement->bindParam(':password', $password);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }

    $valid = ($statement->rowCount() == 1);
    

    if ($valid) {
        $loginArray = $statement->fetchAll();
        foreach ($loginArray as $record){
        $api = $record["api_key"];
        }
    } else {
        $api = null;
    }
     $_SESSION['api_key'] = $api;
    $statement->closeCursor();
}

function addUser($userName, $password, $memType) {
    global $db;
    $query = "INSERT INTO users (username,password,type)"
            . "VALUES (:username,:password,:memType)";
    $statement = $db->prepare($query);
    $statement->bindParam(':username', $userName);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':memType', $memType);

    try {
        $statement->execute();
    } catch (PDOException $ex) {
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $statement->closeCursor();
}

function updateUserApiKey($userName, $api_key, $password) {

    global $db;
    $query = "UPDATE users "
            . "SET api_key = :api_key "
            . "WHERE username = :username "
            . "AND password = :password";

    $statement = $db->prepare($query);
    $statement->bindParam(':username', $userName);
    $statement->bindParam(':api_key', $api_key);
    $statement->bindParam(':password', $password);


    try {
        $statement->execute();
    } catch (PDOException $ex) {
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $statement->closeCursor();
}

function updateUserMemType($userName, $memType, $password) {

    global $db;
    $query = "UPDATE users "
            . "SET type = :memType "
            . "WHERE username = :username "
            . "AND password = :password";

    $statement = $db->prepare($query);
    $statement->bindParam(':username', $userName);
    $statement->bindParam(':memType', $memType);
    $statement->bindParam(':password', $password);


    try {
        $statement->execute();
    } catch (PDOException $ex) {
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $statement->closeCursor();
}
