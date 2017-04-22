SELECT * 
FROM finalproject_users
WHERE username = :username AND password = :password
LIMIT 1