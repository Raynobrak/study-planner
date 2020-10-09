<?php

require_once('connection_holder.php');

function bindValuesToStatement($preparedStatement, $args) {
    foreach($args as $arg){
        $preparedStatement->bindValue($arg[0], $arg[1]);
    }
}

function executeNonQuery($sql, $args = NULL) {
    $connection = DBConnectionHolder::getConnection();
    $sql = $connection->prepare($sql);

    if($args != NULL) {
        bindValuesToStatement($sql, $args);
    }

    return $sql->execute();
}

function executeQuery($query, $args = NULL) {
    $connection = DBConnectionHolder::getConnection();
    $query = $connection->prepare($query);

    if($args != NULL) {
        bindValuesToStatement($query, $args);
    }

    $query->execute();
    $results = $query->fetchALL(PDO::FETCH_BOTH);
    $query->closeCursor();

    return $results;
}

?>