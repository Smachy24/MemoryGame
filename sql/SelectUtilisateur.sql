--Récupere toutes les informations de l'utilisateur si le mail et le mot de passe sont enregistrés

SELECT *
FROM Utilisateur
WHERE email IS NOT NULL AND password IS NOT NULL;