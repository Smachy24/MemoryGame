/*
Select all messages in last 24 hours
*/

SELECT *
FROM message
WHERE DATEDIFF(CURRENT_TIMESTAMP(), message_date)<1

--DATEDIF -> (date 1 - date 2)
