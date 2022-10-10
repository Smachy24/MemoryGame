SELECT game_id, difficulty, score, Utilisateur.pseudo
FROM Score
JOIN Utilisateur ON player_id.Score = Utilisateur.id
JOIN Game ON Score.game_id = Game.id
ORDER BY score, difficulty, Game.id