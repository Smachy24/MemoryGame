SELECT *
FROM message
WHERE message_date <= DATEADD(day, -1, GETDATE())