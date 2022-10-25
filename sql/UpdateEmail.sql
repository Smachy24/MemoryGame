/*
On update l'email du joueur
Requires : Id player and user password
*/

UPDATE Utilisateur
SET email = "test123@gmail.com"
WHERE id = 12345 and password = "test123"
