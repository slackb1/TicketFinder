SELECT * 
FROM finalproject_events
WHERE title LIKE :searchTerm 
OR city LIKE :searchTerm
OR venue LIKE :searchTerm
OR state LIKE :searchTerm
ORDER BY date
