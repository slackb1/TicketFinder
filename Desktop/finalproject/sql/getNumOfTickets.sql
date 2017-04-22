SELECT SUM(SUBQUERY.numOfTickets) as num from
(
  SELECT numOfTickets
  FROM finalproject_reservations
  WHERE eventID = :eventID
) AS SUBQUERY