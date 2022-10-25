/*
Requête permettant d'afficher les scores en fonction du pseudo
*/

SELECT Game.name, Utilisateur.pseudo, difficulty, score, game_date
FROM Score
JOIN Utilisateur ON score.player_id = Utilisateur.id --Relation entre la table score et utilisateur à l'aide de la clé étrangère player_id 
JOIN Game ON Score.game_id = Game.id --Relation entre la table score et game à l'aide de la clé étrangère game_id
WHERE Utilisateur.pseudo = ''
ORDER BY score DESC, difficulty, Game.name --Trie par ordre alphabétique et en fonction du score et de la difficulté
