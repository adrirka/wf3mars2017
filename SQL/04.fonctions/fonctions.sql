-- *********************************************
-- Fonctions prédéfinies
-- *********************************************
-- Fonctions prédéfinies : prévues par le langage SQL, et exécutée par le développeur

-- Dernier ID inséré:
INSERT INTO abonne (prenom) VALUES ('test');
SELECT LAST_INSERT_ID(); -- permet d'afficher le dernier identifiant inséré

-- Fonctions de dates:
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%Y') AS date_rendu_fr FROM emprunt; -- met les dates du champs date_rendu_frau format FR JJ-MM-AAAA

SELECT NOW(); -- affiche la date et l'heure en cours

SELECT DATE_FORMAT(NOW(), '%d-%m-%Y %H:%i:%s');

SELECT CURDATE(); -- retourne la date du jour au format YY-MM-DD
SELECT CURTIME(); -- retourne l'heure courant au format hh:mm:ss

-- Crypter un mot de pass avec l'algorythme AES:
SELECT PASSWORD('mypass'); -- affiche 'mypass' crypté par l'algorythme AES
INSERT INTO abonne (prenom) VALUES(PASSWWORD('mypass')); -- insère le mdp crypté en base 

-- Concaténation 
SELECT CONCAT('a', 'b', 'c'); -- concatène les 3 chaines de caractères
SELECT CONCAT_WS(' - ', 'a', 'b', 'c'); -- concat with separator : concatène avec un séparateur 

-- Fonctions sur les chaines de caractères:
SELECT SUBSTRING('bonjour', 'l', '3'); -- affiche 'bon' : compte 3 à partir de la position 1
SELECT TRIM(' bonjour '); -- supprime les espaces avant et apres la chaine de caractères



-- SOURCES POUR TROUVER DES FONCTIONS SQL : sql.sh

