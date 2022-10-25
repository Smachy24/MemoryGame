/*
On update le password du joueur
Requires : Id player and password player
*/

UPDATE Utilisateur
SET password = "test123"
WHERE id = 12345 AND password = "12345"
