/*
On créé la requête permettant de récupérer les scores des utilisateurs sur un Jeu.
Le résultat est ensuite trié.

*/



SELECT Game.name, Utilisateur.pseudo, difficulty, score, game_date
FROM Score
JOIN Utilisateur ON score.player_id = Utilisateur.id --Relation entre la table score et utilisateur à l'aide de la clé étrangère player_id 
JOIN Game ON Score.game_id = Game.id --Relation entre la table score et game à l'aide de la clé étrangère game_id
ORDER BY Game.name, difficulty, score DESC   --Trie par ordre alphabétique et en fonction du score et de la difficulté

