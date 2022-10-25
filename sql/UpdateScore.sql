-- Update le tableau de score joueur sur la meme difficulté et le meme jeu avec son nouveau score.

UPDATE Score(id,score,game_date)
SET id = 12, score = 2048, game_date = CURRENT_TIMESTAMP();
WHERE player_id= 123;