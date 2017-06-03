select * 
from finalproject_reservations
JOIN finalproject_events ON finalproject_events.eventID = finalproject_reservations.eventID
where userID = :userID