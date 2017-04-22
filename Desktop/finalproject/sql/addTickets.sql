UPDATE finalproject_reservations
SET numOfTickets = :numOfTickets
WHERE eventID = :eventID AND userID = :userID
