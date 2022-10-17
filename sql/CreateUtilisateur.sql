/*
On créé la table Utilisateur
id -> INT PK
email -> VARCHAR(100)
password -> VARCHAR(16) Hashed later (sha256)
pseudo -> VARCHAR(16)
date d'inscription -> DATETIME
date de connexion -> DATETIME
*/

CREATE TABLE Utilisateur( 
  id INT PRIMARY KEY, 
  email VARCHAR(100) UNIQUE,
  password VARCHAR(64),
  pseudo VARCHAR(16) UNIQUE,
  inscription_date DATETIME,
  connexion_date DATETIME DEFAULT CURRENT_TIMESTAMP() 
  ##Current_TIMESTAMP -> current date  
  ##as "YYYY-MM-DD HH-MM-SS"
)
