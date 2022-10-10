/*
Requête permettant d'afficher les scores en fonction du jeu
*/

SELECT game_id, difficulty, score, Utilisateur.pseudo
FROM Score
JOIN Utilisateur ON score.player_id = Utilisateur.id --Relation entre la table score et utilisateur à l'aide de la clé étrangère player_id 
JOIN Game ON Score.game_id = Game.id --Relation entre la table score et game à l'aide de la clé étrangère game_id
ORDER BY score, difficulty, Game.id --Trie par ordre alphabétique et en fonction du score et de la difficulté
WHERE Utilisateur.pseudo = '';