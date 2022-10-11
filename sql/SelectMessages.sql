/*
Select all messages in last 24 hours
*/

SELECT *
FROM message
WHERE DATEDIFF(message_date, CURRENT_TIMESTAMP())<1

--DATEDIF -> (date 1 - date 2)
