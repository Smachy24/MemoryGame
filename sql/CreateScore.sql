/*
On créé la table Score(
  id -> INT PK
  player_id -> INT Clé étrangère (PK de Utilisateur)
  game_id -> INT Clé étrangère (PK de Game)
  difficulty -> VARCHAR(16)
  score -> INT
  date du jeu -> DATETIME
*/

CREATE TABLE Score(
  id INT PRIMARY KEY, 
  player_id INT,
  game_id INT,
  difficulty VARCHAR(16),
  score INT,
  game_date DATETIME
)