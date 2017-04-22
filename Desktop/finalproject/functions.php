<?php 

function searchEvents($database,$searchTerm) {
    $sql = file_get_contents('sql/searchEvents.sql');
    $statement = $database->prepare($sql);
    $params = array(
    'searchTerm' => $searchTerm
    );
    $statement->execute($params);
    return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function getEvent($database, $eventID) {
    $sql = file_get_contents('sql/getEvent.sql');
    $statement = $database->prepare($sql);
    $params = array(
        'eventID' => $eventID
    );
    $statement->execute($params);
    return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function getUserReservations($database, $userID) {
    $sql = file_get_contents('sql/getUserReservations.sql');
    $statement = $database->prepare($sql);
    $params = array(
        'userID' => $userID
    );
    $statement->execute($params);
    return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function getNumofTickets($database, $eventID) {
    $sql = file_get_contents('sql/getNumOfTickets.sql');
    $statement = $database->prepare($sql);
    $params = array(
        'eventID' => $eventID
    );
    $statement->execute($params);
    return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function getUserTicketsForThisEvent($database, $eventID, $userID) {
    $sql = file_get_contents('sql/getUserTicketsForThisEvent.sql');
    $statement = $database->prepare($sql);
    $params = array(
        'eventID' => $eventID,
        'userID' => $userID
    );
    $statement->execute($params);
    return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function reserveTickets($database, $eventID, $userID, $numOfTickets) {
    $sql = file_get_contents('sql/reserveTickets.sql');
    $statement = $database->prepare($sql);
    $params = array(
        'eventID' => $eventID,
        'userID' => $userID,
        'numOfTickets' => $numOfTickets
    );
    $statement->execute($params);
    //return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function editTickets($database, $eventID, $userID, $numOfTickets) {
    $sql = file_get_contents('sql/addTickets.sql');
    $statement = $database->prepare($sql);
    $params = array(
        'eventID' => $eventID,
        'userID' => $userID,
        'numOfTickets' => $numOfTickets
    );
    $statement->execute($params);
    //return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function deleteReservation($database, $eventID, $userID) {
    $sql = file_get_contents('sql/deleteReservation.sql');
    $statement = $database->prepare($sql);
    $params = array (
        'eventID' => $eventID,
        'userID' => $userID
    );
    $statement->execute($params);
}

function addNewEvent($database, $title, $venue, $city, $state, $date) {
    $sql = file_get_contents('sql/addNewEvent.sql');
    $statement = $database->prepare($sql);
    $params = array (
        'title' => $title,
        'venue' => $venue,
        'city' => $city,
        'state' => $state,
        'date' => $date
    );
    $statement->execute($params);
}

function getAllEvents($database) {
    $sql = file_get_contents('sql/getAllEvents.sql');
    $statement = $database->prepare($sql);
    $statement->execute();
    return ($statement->fetchAll(PDO::FETCH_ASSOC));
}

function removeEvent($database, $eventID) {
    $sql = file_get_contents('sql/removeEvent.sql');
    $statement = $database->prepare($sql);
    $params = array (
        'eventID' => $eventID
    );
    $statement->execute($params);
}


?>