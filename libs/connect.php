<?php
//function getDB with PDO
function getDB()
{
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=test;charset=utf8', 'root', '12345678');
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

getDB();