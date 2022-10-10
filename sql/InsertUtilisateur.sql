-- Insert dans le tableau Utilisateur l'email de l'utilisateur (Unique), son mot de passe hashé, son mot de passe (Unique) et la date et l'heure de son inscription.

INSERT INTO Utilisateur(email, password, pseudo, inscription_date)
VALUES (UNIQUE 'mail', HASHBYTES('SHA2_256','mdp'),UNIQUE 'pseudo','2022-10-10 11:32:43');
