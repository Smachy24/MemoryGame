/*
On créé la table Score(
  id -> INT PK
  player_id -> INT Clé étrangère (PK de Utilisateur)
  difficulty -> VARCHAR(16)
  score -> INT
  date du jeu -> DATETIME
*/

CREATE TABLE Score(
  id INT PRIMARY KEY, 
  player_id INT,
  difficulty VARCHAR(16),
  score INT,
  game_date DATETIME
)