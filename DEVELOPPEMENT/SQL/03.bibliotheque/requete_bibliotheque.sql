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
SELECT auteur FROM livre WHERE titre = 'Une vie';

=> GUY DE MAUPASSANT

-- 6.De combien de livres d'Alexandre Dumas dispose-t-on ?
SELECT COUNT(id_livre) from livre WHERE auteur = 'ALEXANDRE DUMAS';

=> 2

-- 7.Quel id_livre est le plus emprunté ?
SHOW TABLES;
SELECT * FROM emprunt;
SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

-- 8.Quel id_abonne emprunte le plus de livre ? 
SELECT id_abonne, COUNT(id_emprunt) AS nombre FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1;


-- *********************************************
-- Requêtes imbriquées 
-- *********************************************
-- Syntaxe "aide mémoire" de la reqûete imbriquée : 
-- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

-- Afin de réaliser une requête imbriquée il faut obligatoirement un champ en COMMUN entre les deux tables.

-- Un champs NULL se teste avec IS NULL:
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL; -- affiche les id_livre non rendus

-- Afficher les titres de ces livres non rendus: 
SELECT titre FROM livre WHERE id_livre IN
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- Afficher le numéro des livres que Chloé a emprunté :
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'); -- qd il n'y a qu'un seul résultat dans la requête imbriquée on met un signe "="


-- *********************************************
-- EXERCICE 
-- *********************************************

-- Afficher le prénom des abonnés ayant emprunté un livre le 19-12-2011
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie = '2011-12-19');

-- Afficher le prénom des abonnés ayant emprunté un livre d'Alphonse Daudet
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre IN (SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet'));

-- Afficher le ou les titres de livres que Chloé a emprunté (s) : 
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe'));

-- Afficher le ou les titres de livres que Chloé n'a pas encore rendu(s)
SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe' ));

-- Combien de livres Benoit a empruntés ?
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'Benoit');

--  Qui (prénom) a emprunté le plus de livres ?
SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1);


-- *********************************************
-- Jointures internes
-- *********************************************

-- Différence entre jointure et une requête imbriquée: 

-- une requête imbriquée est possible seulement dans le cas où les champs affichés (ceux dans le SELECT) sont issus de la même table.

-- avec une requête de jointure, les champs sélectionnés peuvent être issus de tables différentes. Une jointure est une requête permettant de faire des relations entre les différentes tables afin d'avoir des colonnes ASSOCIEES qui ne forme qu'UN SEUL résultat.

-- Afficher les dates de sortie et de rendu pour l'abonné Guillaume:
SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a --"a" est ici un alias
INNER JOIN emprunt e --"e" est ici un alias
ON a.id_abonne = e.id_abonne
WHERE a.prenom = 'guillaume';

-- 1ere ligne : ce que je souhaite afficher 
-- 2eme ligne : la 1ere table d'où proviennent les informations 
-- 3eme ligne : la seconde table d'où proviennent les informations
-- 4eme ligne : la jointure qui lie les 2 tables avec le champs COMMUN
-- 5eme ligne : la ou les conditions supplémentaires 


-- *********************************************
-- EXERCICE 
-- *********************************************

-- Nous aimerions connaitre les mouvements des livres (titre, date_sortie et date_rendu) écrits par Alphonse Daudet

SELECT l.titre, e.date_sortie, e.date_rendu
FROM livre l
INNER JOIN emprunt e 
ON l.id_livre = e.id_livre
WHERE l.auteur = 'ALPHONSE DAUDET';

-- Qui a emprunté "Une Vie" sur l'année 2011 ?

SELECT a.prenom, a.id_abonne
FROM abonne a 
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre
WHERE l.titre = 'Une vie' AND e.date_sortie LIKE '2011%'; -- "%" signifie toute l'année 

--  Afficher le nombre de livres empruntés par chaque abonné 

SELECT a.prenom, COUNT(e.id_emprunt) AS nombre
FROM abonne a
INNER JOIN emprunt e 
ON a.id_abonne = e.id_abonne
GROUP BY a.id_abonne;

-- Afficher qui a emprunté quels livres et à quelles dates de sortie ? (prénom, date_sortie, titre) 

SELECT a.prenom, l.titre, e.date_sortie
FROM abonne a  
INNER JOIN emprunt e
ON e.id_abonne = a.id_abonne
INNER JOIN livre l 
ON l.id_livre = e.id_livre;
-- Ici pas de GROUP BY§ car il est normal que les prénoms sortent fois (ils peuvent emprunter plusieurs livres)

-- Afficher les prénoms des abonnes avec les id_livres qu'ils ont empruntés :
SELECT a.prenom, e.id_livre
FROM abonne a 
INNER JOIN emprunt e 
ON a.id_abonne = e.id_abonne;


-- *********************************************
-- Jointures externes
-- *********************************************

-- Une jointure externe permet de faire des requêtes sans correspondance exigée entre les valeurs répétées

-- Ajouter vous dans la table abonné
INSERT INTO abonne (prenom) VALUES('moi');

-- Si on relance la dernière requête de jointure interne, nous n'apparaissons pas dans la listecar nous n'avons pas emprunté de livre
-- Pour y remédier nous faisons une requête pour une jointure externe :

SELECT a.prenom, e.id_livre
FROM abonne a 
LEFT JOIN emprunt e
ON a.id_abonne = e.id_abonne;
-- La close LEFT JOIN permet de rapatrier TOUTES les données dans la table considérée comme étant à gauche de l'instruction LEFT JOIN (donc à 'abonne a') sans correspondance exigée dans l'autre table (emprunt 'e')

-- Voici le cas avec un livre supprimé de la bibliothèque
DELETE FROM livre WHERE id_livre = 100; -- Le livre 'Une vie'

-- On visualise les emprunts avec une jointure interne:

SELECT emprunt.id_emprunt, livre.titre -- On peut aussi utiliser le nom de la table directement versus une initiale
FROM emprunt
INNER JOIN livre 
ON emprunt.id_livre = livre.id_livre; 
-- On ne voit pas dans cette requête le livre 'Une vie' qui a été supprimée

-- On fait la même chose avec une jointure externe :
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
LEFT JOIN livre 
ON emprunt.id_livre = livre.id_livre; 
-- Ici tous les emprunts sont affichés, y compris ceux pour lesquels les titres sont supprimés ou remplacés par NULL


-- *********************************************
-- UNION
-- *********************************************

-- Union permet de fusionner le résultat de deux requêtes dans la même liste de résultat

-- Exemple : si on désinscrit Guillaume (suppression du profil de la table abonne) on peut afficher à la fois tous les livres empruntés, y compris ceux par des lecteurs désinscrits (on affiche NULL à la place de Guillaume), et tous les abonnés, y compris ceux qui n'ont rien emprunté (on affiche NULL dans id_livre pour l'abonné 'moi')

-- Suppression du profil de Guillaume
DELETE FROM abonne WHERE id_abonne = 1;

-- Requête sur les livres empruntés avec UNION:
(SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne)
UNION
(SELECT abonne.prenom, emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);
