-- Ouvrir la console SQL sous XAMPP :

    -- cd c:\xampp\mysql\bin
    --  mysql.exe -u root --password (tapez entrer directement sans mdp)


-- *********************************************
-- CREATION DE LA BDD
-- *********************************************

CREATE DATABASE bibliotheque;

USE bibliotheque;

-- Copier/coller le contenu de bibliotheque.sql dans la console 


-- *********************************************
-- Exercice
-- *********************************************

-- 1.Quel est l'id_abonne de Laura
SHOW TABLES;
SELECT * FROM abonne;
SELECT id_abonne FROM abonne WHERE prenom = 'Laura';

=>4

-- 2.L'abonné d'id_abonne 2 est venu emprunter un livre à quelle date ?
SHOW TABLES;
SELECT * FROM emprunt;
SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

=> 2011-12-18  
   2012-03-20  
   2013-06-15

-- 3.Combien d'emprunt ont été effectués en tout ?
SELECT COUNT(id_emprunt) FROM emprunt;

=> 8

-- 4.Combien de livres sont sortis le 2011-12-19
SELECT COUNT(id_livre) FROM emprunt WHERE date_sortie = '2011-12-19';

=> 3

-- 5.Une vie est de quel auteur ?
SHOW TABLES;
SELECT * FROM livre;
SELECT titre = 'Une vie' FROM livre WHERE id_livre = 100;

-- 6.De combien de livres d'Alexandre Dumas dispose-t-on ?
-- 7.Quel id_livre est le plus emprunté ?
-- 8.Quel id_abonne emprunte le plus de livre ? 