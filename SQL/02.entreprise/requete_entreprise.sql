
-- Ouvrir la console SQL sous XAMPP :

    -- cd c:\xampp\mysql\bin
    --  mysql.exe -u root --password (tapez entrer directement sans mdp)

-- Ligne de commentaire en SQL début par --
-- Les requêtes ne sont pas sensibles à la casse, mais une convention indique qu'il faut mettre les mots clés des requêtes en MAJ



-- ***************************************
--  Requêtes générales
-- ***************************************

CREATE DATABASE entreprise;   -- crée une nouvelle bdd appelée "entreprise"

SHOW DATABASES; -- permet d'afficher les BDD dispos

--  NE PAS SAISIR DANS LA console
DROP DATABASE entreprise; -- supprimer la BDD entreprise

DROP table employes; -- supprimer la table employes

TRUNCATE employes; -- vider la table employes de son contenu 


--  On peut coller dans la console 
USE entreprise; -- se connecter à la BDD entreprise

SHOW TABLES; -- permet de lister les tables de la BDD en cours d'utilisation

DESC employes; -- observer la structure de la table ainsi que les champs DESC pour les describes




-- ***************************************
--  Requêtes de sélection
-- ***************************************

SELECT nom, prenom FROM employes; -- affiche (sélectionne) le nom et le prénom de la table employes: SELECT sélectionne les champs indiqués, FROM la ou ou les tables utilisées

SELECT service FROM employes; -- affiche les services de l'entreprise

-- DISTINCT
-- On a vu dans la requête précédente qu'il y a une récurrence dans l'affichage des différents services. Pour éliminer les doublons on utilise DISTINCT
SELECT DISTINCT service FROM employes; 
--  ALL ou *
--  On peut afficher toutes les infos issues d'une table avec une "*" (=pour dire ALL)
SELECT * FROM employes; -- affiche toute la table employes

--  Clause WHERE
SELECT prenom, nom FROM employes WHERE service = 'informatique'; -- affiche le prenom et le nom des des employes du service informatique. Notez que le nom ou les champs des Tables ne prennent pas de quotes/guillemet, contrairement aux valeurs textuelles (=STRING) à l'exception d'une valeur NUMBER : c'est le contraire du JS.

-- BETWEEN
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; -- affiche les employes dont la date d'embauche est comprise entre 2006 et 2010

--LIKE
SELECT prenom FROM employes WHERE prenom LIKE 's%'; -- affiche les prenoms des employes commençant par 's'. Le signe % est un joker qui remplace les autres caractères 
SELECT prenom FROM employes WHERE prenom LIKE '%-%'; -- affiche les prenoms qui contiennent un tirer (soit les prénoms composés)
-- LIKE est utilisé entre autre pour les formulaires de recherche sur les sites.

--  Opérateurs de comparaison : 
SELECT prenom, nom, service FROM employes WHERE service != 'informatique'; 

--             =
--             <
--             >
--             <= (supérieur ou égal)
--             >=
--             != ou encore <> pour différent de 


-- ORDER BY pour faire des tris :
SELECT nom, prenom, service, salaire FROM employes ORDER by salaire;
-- affiche les employes par salaire en ordre croissant

SELECT nom, prenom, service, salaire FROM employes ORDER by salaire ASC, prenom DESC;
--  ASC pour un tri ascendant, DESC descendant. Ici on trie les salaires par ordre croissant puis à un salaire identique les prénoms par ordre décroissant

-- LIMIT
SELECT nom, prenom, salaire FROM employes ORDER by salaire DESC LIMIT 0,1;
--  affiche l'employe ayant le salaire le plus élevé : on trie d'abord les salaires par ordre décroissant (pour avoir le plus élevé en premier), puis on limite le résultat au premier enregistrement avec LIMIT 0,1. Le 0 signifie le point de départ de LIMIT, et le 1 signifie prendre 1 enregistrement. On utilise LIMIT dans la pagination sur les sites;

-- l'alias avec AS :
SELECT nom, prenom, salaire * 12 AS salaire_annuel FROM employes; 
-- Affiche le salaire sur 12 mois des employés. salaire_anuel est un alias qui stocke la valeur de ce qui précède. Ici '*' ne signfie pas 'ALL' car est suivi d'une valeur numérique : c'est donc un opérateur aritmétique (*=multipié)

-- SUM 
SELECT SUM(salaire * 12) As total FROM employes; -- affiche le salaire total annuel de tous les employes. SUM permet d'additionner des valeurs de champs différents. l'alias est juste une étiquette de type STRING pour indication, ce n'est pas une variable stockée

--MIN et MAX
SELECT MIN(salaire) FROM employes; -- affiche le salaire le plus bas
SELECT MAX(salaire) FROM employes; -- affiche le salaire le plus haut
-- cas particulier de MIN et MAX 
SELECT prenom, MIN(salaire) FROM employes; -- Ici la requête ne fonctionne pas car affiche le premier prénom dans la table. Il aurait fallu passer par une requête de type ORDER by et LIMIT :
SELECT prenom, salaire FROM employes ORDER by salaire ASC LIMIT 0,1;

--AVG
SELECT AVG(salaire) FROM employes; -- affiche la moyenne des salaires

-- ROUND
SELECT ROUND(AVG(salaire), 1) FROM employes; -- affiche le salaire moyen arrondi à 1 chiffre après la virgule

-- COUNT 
SELECT COUNT(id_employes) FROM employes WHERE sexe = 'f'; -- Affiche le nombre d'employés de sexe féminins

-- IN
SELECT prenom, service FROM employes WHERE service IN('comptabilite','informatique');
-- Affiche les employes appartenant à la comptabilité ou à l'informatique

-- NOT IN
SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');
-- Affiche les employes n'appartenant pas à la comptabilité ou à l'informatique

--AND et OR
SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000; 
-- Affiche le prénom des commerciaux dont le salaire est inférieur ou égal à 2000

SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300; 
-- Affiche les employes du service production dont le salaire est de 1900, ou dans les autres services ceux qui gagnent 2300

-- GROUP BY
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service; 
-- Affiche le nombre d'employes PAR service. GROUP BY distribue les résultats du comptage par les services correspondants

-- GROUP BY ... HAVING
SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1;
-- affiche les services où il y a plus d'un employés. HAVING remplace WHERE dans un GROUP BY



-- ***************************************
--  Requêtes d'insertion
-- ***************************************

SELECT * FROM employes;
--  Affiche l'ensemble de la table avant modification

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800); 
-- Insertion d'un employe. Notez que l'ordre des champs énoncés entre les deux paires de parentheses doit être le même pour que les valeurs correspondent.

-- une reqûete sans préciser les champs concernés
INSERT INTO employes VALUES(8060, 'test', 'test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop'); 
-- insertion d'un employe sans préciser la liste des champs si et seulement si le nombre et l'ordre des valeurs attendues sont respectés => ici erreur car une valeur en trop


-- ***************************************
--  Requêtes de modification
-- ***************************************

-- UPDATE
UPDATE employes SET salaire = 1870 WHERE nom = 'cottet'; -- modifier le salaire de l'employe de nom cottet

UPDATE employes SET salaire = 1871 WHERE id_employes = 699; -- il est recommandé de faire des modifications de données par les id car ils sont uniques. Cela évite d'updater plusieurs enregistrements à la fois

UPDATE employes SET salaire = 1872, service = 'autre' WHERE id_employes = 699; -- on modifie 2 valeurs dans la même requête

-- A NE PAS FAIRE (sauf cas contraire) : un UPDATE sans clause WHERE :
UPDATE employes SET salaire = 1870; -- ici les salaires de tous les employes passent à 1870

-- REPLACE 
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing', '2010-07-05', 2600); -- l'id_employes 2000 n'existant pas le REPLACE INTO se comporte comme un INSERT

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test2', 'test2', 'm', 'marketing', '2010-07-05', 2601); -- l'id_employes 2000 existe donc le REPLACE INTO se comporte comme un UPDATE


-- ***************************************
--  Requêtes de suppression
-- ***************************************

-- DELETE 
DELETE FROM employes WHERE id_employes = 900; -- suppression de l'employe dont l'id est 900

DELETE FROM employes WHERE service = 'informatique' AND id_employes !=802; -- supprime tous les informaticiens sauf 1 (dont l'id est 802)

DELETE FROM employes WHERE id_employes = 388 OR id_employes = 990; -- supprime deux employés qui n'ont pas de point commun. Il s'agit d'un OR et non pas d'un AND car un employé ne peut pas avoir 2 id_employes différents.

-- A NE PAS FAIRE : un DELETE sans clause WHERE: 
DELETE FROM employes; -- revient à faire un TRUNCATE de la table qui est irréversible



-- ***************************************
--  Exercices
-- ***************************************

-- 1.Afficher le service de l'employé 547
SELECT service FROM employes WHERE id_employes = 547;

-- 2.Afficher la date d'embauche d'Amandine
SELECT date_embauche FROM employes WHERE prenom = 'Amandine';

-- 3.Afficher le nombre de commerciaux
SELECT COUNT(id_employes) FROM employes WHERE service = 'commercial';

-- 4.Afficher le coût des commerciaux sur 1 an
SELECT SUM(salaire * 12) As Cout_Commerciaux FROM employes WHERE service = 'commercial';

-- 5.Afficher le salaire moyen par service
SELECT service, AVG(salaire) As Salaire_moyen FROM employes GROUP BY service;

-- 6.Afficher le nombre de recrutements sur lannée 2010 (3 syntaxes possibles)
SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';
SELECT COUNT(id_employes) FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <= '2010-12-31';
SELECT COUNT(date_embauche) FROM employes WHERE date_embauche LIKE '2010';

-- 7.Augmenter le salaire de chaque employé de 100
UPDATE employes SET salaire = salaire + 100;

-- 8.Afficher le nombre de services différents
SELECT COUNT(DISTINCT service) FROM employes;

-- 9.Afficher le nombre d'employés par service
SELECT service, COUNT(id_employes) As Employes_par_Service FROM employes GROUP By service;

-- 10.Afficher les infos de l'employé du service commercial ayant le salaire le plus élevé
SELECT nom, prenom, service, salaire FROM employes WHERE service = 'commercial' ORDER by salaire DESC LIMIT 0,1;

-- 11.Afficher l'employé ayant été embauché en dernier
SELECT id_employes, nom, prenom, date_embauche FROM employes ORDER by date_embauche DESC LIMIT 0,1;