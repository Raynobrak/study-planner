<?php

// The following constants are used to connect to the database.
// Modify these as needed.
const HOST = 'mysql:host=localhost';
const DATABASE_NAME = 'db_name';
const USER = 'username';
const PASSWORD = 'password';

/**
 * This class holds a connection to the database.
 * NOTE : There cannot be 2 connections to 2 different databases.
 */
class DBConnectionHolder
{
    private static $connection;

    public static function getConnection() {
        if(!isset(DBConnectionHolder::$connection)) {
            DBConnectionHolder::connect();
        }
           
        return DBConnectionHolder::$connection;
    }

    private static function connect(){
        try {
            DBConnectionHolder::$connection = new PDO(HOST.'; dbname='.DATABASE_NAME, USER, PASSWORD);
        } 
        catch(Exception $exception) {
            // The following is poor error handling.
            // You might want to give a more detailed 
            // explanation of the error to the user.
            echo 'ERROR : Could not connect to the database.';
        }
    }
}

?>