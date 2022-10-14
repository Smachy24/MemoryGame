/*
Requête permettant d'afficher les scores en fonction de la difficulté
*/

SELECT Game.name, difficulty, score, Utilisateur.pseudo
FROM Score
JOIN Utilisateur ON score.player_id = Utilisateur.id --Relation entre la table score et utilisateur à l'aide de la clé étrangère player_id 
JOIN Game ON Score.game_id = Game.id --Relation entre la table score et game à l'aide de la clé étrangère game_id
WHERE Score.difficulty = '';
ORDER BY score DESC, difficulty, Game.name --Trie par ordre alphabétique et en fonction du score et de la difficulté
