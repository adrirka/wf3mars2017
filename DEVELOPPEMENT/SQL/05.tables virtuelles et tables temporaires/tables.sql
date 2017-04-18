-- *********************************************
-- Tables virtuelles : vues 
-- *********************************************

-- Les vues (ou tables virtuelles) sont des objets de la base de données, constitués d'un nom et d'une requête de sélection

-- Une fois une vue définie, on peut l'utiliser comme on le ferait 

USE entreprise;

-- Création d'une vue : 
CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe = 'm'; -- créer une table virtuelle (ou vue) remplie avec les données du SELECT

-- Une seconde requête effectuée sur la vue :
SELECT prenom FROM vue_homme;

-- si il y a un changement dans la table d'origine, la vue est corrigée dynamiquement car elle enregistre la requête SELECT qui pointe vers la table d'orgine. Inversement, s'il y a un changement dans la table virtuelle, il s'impacte dans la table d'origine.
-- Il y a intérêt à faire des vues en termes de gain de ressources ou quand il y a des requêtes complexes à exécuter.

SHOW TABLES; -- cette vue est visible dans la liste des tables avec cette instruction 

-- supprimer une vue : 
DROP VIEW vue_homme;


-- *********************************************
-- Tables virtuelles : vues 
-- *********************************************

-- Créer une table temporaire :
CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f'; -- Créer une table temporaire avec des données du SELECT précisé. Cette table s'efface quand on quitte la session, elle n'est pas visible dans la liste des tables avec SHOW TABLES.

-- Utiliser une table temporaire : 
SELECT prenom FROM temp; -- Affiche les prénoms de la table temporaire temp

-- Contairement aux tables virtuelles s'il y a un changement dans la table d'origine, il n'est pas impacté dans la table temporaire car celle ci est une copie à un instant T : les données sont duppliquées. 

