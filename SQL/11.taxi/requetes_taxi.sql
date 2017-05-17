-- Ouvrir la console SQL sous XAMPP :

    -- cd c:\xampp\mysql\bin
    --  mysql.exe -u root --password (tapez entrer directement sans mdp)

CREATE DATABASE taxis;
USE taxis;

    -- coller le contenu du fichier taxis.mysql

SHOW tables; -- pour vérifier que les tables ont bien été insérées

-- *********************************************
-- EXERCICES
-- *********************************************

-- 1. Qui conduit la voiture d'id_vehicule 503

    -- 2versions possibles ici

    -- Versions imbriquées : la version imbriquée est possible ici car dans le SELECT le champs à afficher est issue d'une seule et même table

SELECT prenom, nom FROM conducteur WHERE id_conducteur = (SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = '503');

    -- Version jointure : quoiqu'il en soit elle marchera que les champs à afficher soient issus ou non de la même table

SELECT conducteur.prenom, conducteur.nom
FROM conducteur
INNER JOIN association_vehicule_conducteur
ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
WHERE association_vehicule_conducteur.id_vehicule = '503';


-- 2. Qui (prenom) conduit quel modele ?
SELECT conducteur.prenom, vehicule.modele
FROM conducteur 
INNER JOIN association_vehicule_conducteur 
ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
INNER JOIN vehicule 
ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule;


-- 3. Insérer vous dans la table conducteur. Puis afficher tous les conducteurs (même ceux qui n'ont pas de véhicule affecté) ainsi que les modeles de véhicules.
INSERT INTO conducteur (id_conducteur, prenom, nom) VALUES (6, 'Mon_prenom', 'Mon_nom');

SELECT conducteur.prenom, vehicule.modele
FROM conducteur 
LEFT JOIN association_vehicule_conducteur -- ici le LEFT JOIN dit "la table de gauche conducteur est exhausitve y compris ceux qui n'ont pas de véhicule" : la requête prend donc en compte le nouvel utilisateur affecté en INSERT INTO sans véhicule
ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
LEFT JOIN vehicule 
ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule;

-- 4. Ajouter l'enregistrement suivant :
INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES ('Renault', 'Espace', 'noir', 'ZE-123-RT');
-- Puis afficher tous les modèles de véhicule y compris ceux qui n'ont pas de chauffeur affecté, et le prénom des conducteurs

SELECT vehicule.modele, vehicule.marque, conducteur.prenom, conducteur.nom
FROM vehicule
LEFT JOIN association_vehicule_conducteur
ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
LEFT JOIN conducteur
ON association_vehicule_conducteur.id_conducteur = conducteur.id_conducteur;


-- 5. Afficher les prénoms des conducteurs (y compris ceux qui n'ont pas de véhicule) et tous les modèles (y compris ceux qui n'ont pas de chauffeur).

SELECT conducteur.prenom, conducteur.nom, vehicule.modele, vehicule.marque
FROM conducteur
LEFT JOIN association_vehicule_conducteur
ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
LEFT JOIN vehicule
ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule

UNION 

SELECT conducteur.prenom, conducteur.nom, vehicule.modele, vehicule.marque
FROM conducteur
RIGHT JOIN association_vehicule_conducteur
ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
RIGHT JOIN vehicule
ON association_vehicule_conducteur.id_vehicule = vehicule.id_vehicule;
