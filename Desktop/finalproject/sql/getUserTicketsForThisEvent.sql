select SUM(numOfTickets) as tix 
from finalproject_reservations
WHERE userID = :userID and eventID = :eventID