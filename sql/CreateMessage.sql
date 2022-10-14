/*
On créé la table Message
id -> INT PK
id_sender -> INT Clé étrangère (PK de Utilisateur),
id_receiver -> INT Clé étrangère(PK de Utilisateur)
message -> VARCHAR(500)
date du message -> DATETIME
*/

CREATE TABLE Message(
  id INT PRIMARY KEY, 
  id_game INT,
  id_sender INT,
  message VARCHAR(500),
  message_date DATETIME DEFAULT CURRENT_TIMESTAMP() 
)
