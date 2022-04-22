CREATE DATABASE entreprise; -- Créer une nouvelle BDD

SHOW DATABASES; -- Lister BDD

SHOW TABLES FROM entreprise; -- Lister une (ou) plusieurs tables de la BDD 'entreprise'

CREATE TABLE employes; -- Créer une nouvelle table

USE entreprise; -- Permet de selectionner/utiliser une BDD

DROP DATABASE entreprise; -- Supprime une BDD

DROP TABLE employes; -- Permet de supprimer une table

TRUNCATE employes; -- Permet de vider une table;

-- Chaque requête se termine toujours par un point-virgule ';'. C'est le délimiteur

-- #################### REQUETE DE SELECTION ####################

-- Affichage complet de la table
SELECT id_employes, prenom, nom, sexe, service, date_embauche, salaire FROM employes;
-- AFFICHE-MOI [noms des colonnes/champs] de [nom de la table]

SELECT * FROM employes;
-- AFFICHE-MOI [noms des colonnes/champs] de [nom de la table]
-- * : raccourci, ALL

-- Quels sont les noms et prénoms des employés travaillant dans l'entreprise ?
SELECT nom, prenom FROM employes;

-- EXO: Quels sont les différents services occupés par les employés travaillant dans l'entreprise ? 
SELECT service FROM employes;

-- DISTINCT
-- Affichage des services 
SELECT DISTINCT service FROM employes;
-- DISTINCT permet d'éliminer les doublons

-- WHERE
-- Affichage des employés du service informatique
SELECT nom, prenom FROM employes WHERE service = 'informatique';
-- AFFICHE-MOI [nom des colonnes] DE [nom de la table] A CONDITION QUE [colonne = valeur];
-- WHERE: A CONDITION QUE


-- BETWEEN + AND : entre ... et ...
-- Affichage des employés ayant été recrutés entre 2010 et aujourd'hui
SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2022-04-05';

SELECT CURDATE(); -- fonction prédéfinie SQL qui retourne la date du jour

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND CURDATE();


-- LIKE: valeur approchante
-- Affichage des employés ayant un prénom commençant par la lettre 's'
SELECT prenom FROM employes WHERE prenom LIKE 's%';

-- Affichage des employés ayant un prénom finissant par la lettre 's'
SELECT prenom FROM employes WHERE prenom LIKE '%s';

-- Affichage des employés ayant un prénom composé contenant '-'
SELECT prenom FROM employes WHERE prenom LIKE '%-%';

-- Affichage de tous les employés (sauf les informaticiens)
SELECT nom, prenom, service FROM employes WHERE service != 'informatique';
-- != : différent de...

-- RAPPEL: OPERATEURS DE COMPARAISON
-- =    égal à...
-- <    strictement supérieur 
-- >    strictement inférieur
-- <=   inférieur ou égal 
-- >=   supéreur ou égal
-- AND  et
-- OR   ou

-- Affichage des employés gagnant un salaire supérieur à 3000 euros
SELECT nom, prenom, service, salaire FROM employes WHERE salaire > 3000;


-- ORDER BY
-- Affichage des employés dans l'ordre alphabétique
SELECT prenom FROM employes ORDER BY prenom ASC;
SELECT prenom FROM employes ORDER BY prenom;
-- ORDER BY: permet d'effectuer un classement
--ASC: ascendant croissant

SELECT prenom FROM employes ORDER BY prenom DESC;
-- DESC: descendant décroissant


-- LIMIT
-- Affichage des employés 3 par 3
SELECT prenom FROM employes ORDER BY prenom ASC LIMIT 0,3;
SELECT prenom FROM employes ORDER BY prenom ASC LIMIT 3,3;
SELECT prenom FROM employes ORDER BY prenom ASC LIMIT 6,3;
-- LIMIT 0,3: 0 => position de départ | 3 => nombre d'éléments souhaité
-- LIMIT est utilisé sur un site pour la pagination, soit la séparation en plusieurs pages d'une liste de données

-- Affichage des employés avec un salaire annuel
SELECT prenom, salaire*12 FROM employes;
SELECT prenom, salaire*12 AS 'Salaire annuel' FROM employes;
-- AS: Le mot-clé permet de définir un Alias


-- SUM (fonction prédéfinie SQL)
-- Affichage de la masse salariale sur 12 mois
SELECT SUM(salaire*12) AS 'Masse salariale' FROM employes;
-- SUM: Somme

-- AVG (fonction prédéfinie SQL)
-- Affichage du salaire moyen
SELECT AVG(salaire) AS 'Salaire moyen' FROM employes;
-- AVG: Calcul d'une moyenne 

--ROUND (fonction prédéfinie SQL)
SELECT ROUND(AVG(salaire),2) AS 'Salaire moyen' FROM employes;
-- ROUND: Permet d'arrondir

-- COUNT (fonction prédéfinie SQL)
SELECT COUNT(*) FROM employes WHERE sexe = 'f';
-- COUNT: Permet de compter
-- COUNT(): va ré-associer à +1 à chaque fois que le champ 'sexe' a pour valeur 'f'

-- MIN/MAX (fonctions prédéfinies SQL)
-- Affichage du salaire maximum/minimum
SELECT MAX(salaire) AS 'Salaire max' FROM employes;
SELECT MIN(salaire) AS 'Salaire min' FROM employes;

-- EXO: afficher les données de l'employé qui gagne le moins dans l'entreprise
SELECT prenom, nom, MIN(salaire) AS 'Salaire min' FROM employes; --/!\ Résultat erroné

-- REQUETE IMBRIQUEE SUR LA MEME TABLE
-- C'est la requête entre parenthèses qui est exécutée en premier
SELECT nom, prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes);


-- IN
-- Affichage des employés travaillant dans les services 'comptabilite' et 'informatique'
SELECT prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique');
-- = : permet d'inclure une seule valeur
-- IN: permet d'inclure plusieurs valeurs

-- NOT IN 
-- Affichage des employés NE TRAVAILLANT PAS dans les services 'comptabilite' et 'informatique'
SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');
-- != : permet d'exclure une seule valeur
-- NOT IN: permet d'exclure plusieurs valeurs


-- AND
-- Affichage des commerciaux gagnant un salaire inférieur à 2000 euros
SELECT prenom, nom, service, salaire FROM employes WHERE service = 'commercial' AND salaire < 2000;
-- AND et... (condition complémentraire)

-- OR
-- Afficage des employés du service 'commercial' ayant un salaire de 2300 euros ou de 1900 euros
SELECT prenom, nom, service, salaire FROM employes WHERE service = 'commercial' AND salaire = 2300 OR salaire = 1900; --/!\ Résultat erroné
-- Sans les parenthèses, le OR prend le dessus sur le AND

-- Vrai résultat
SELECT prenom, nom, service, salaire FROM employes WHERE service = 
'commercial' AND (salaire = 2300 OR salaire = 1900);


-- GROUP BY
-- Affichage du nombre d'employés par service
SELECT service, COUNT(*) AS 'Nb employes' FROM employes GROUP BY service;
-- GROUP BY permet d'effectuer des regroupements
-- GROUP BY va ré-associer les nombres (+1) par service
-- EX:
-- direction +1
-- comptabilite +1 +1 
-- informatique +1 +1 
-- production +1


-- #################### REQUETE D'INSERTION ####################
 INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Fleury', 'VUADIAMBO', 'm', 'informatique', '2021-09-01', '1200');

-- Il est possible de définir l'id_employes 
INSERT INTO employes VALUES (100, 'Edouard', 'Philippe', 'm', 'politique', '2013-05-06', 1230);

-- Il est possible d'insérer les valeurs sans appeler les champs. Par contre, il faut définir une valeur par défaut pour la colonne 'id_employes'
INSERT INTO employes VALUES (NULL, 'Emmanuel', 'MACRON', 'm', 'nettoyage', '2021-09-01', 1);

-- #################### REQUETE DE MODIFICATION ####################
UPDATE employes SET salaire = 1560, service = 'comptabilite' WHERE id_employes = 1006;
-- UPDATE [nom de la table] SET colonne = 'nouvelle valeur', colonne = 'nouvelle valeur' WHERE [à condition que];

-- REPLACE
-- Si l'ID n'est pas connu en BDD, REPLACE se comporte comme un INSERT
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (NULL, 'Muriel', 'Penicaud', 'f', 'cuisine', '2020-03-02', 1230);

-- Si l'ID est connu en BDD, REPLACE agira comme un UPDATE
REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (1007, 'Edouard', 'Philippe', 'm', 'nettoyage', '2019-03-02', 1530);

-- #################### REQUETE DE SUPPRESSION ####################
DELETE FROM employes WHERE id_employes IN (1003, 1004, 1005, 1006, 1007);
-- DELETE FROM [nom de la table] WHERE [à condition que];


-- ############################ EXO REQUETES ############################

-- 1 -- Afficher la profession de l'employé 547 
SELECT  service FROM employes WHERE id_employes = 547;

-- 2 -- Afficher la date d'embauche d'Amandine
SELECT date_embauche FROM employes WHERE prenom = 'Amandine';

-- 3 -- Afficher le nom de famille de Guillaume
SELECT nom FROM employes WHERE prenom = 'Guillaume';

-- 4 -- Afficher le nombre de personnes ayant un ID commençant par le chiffre 5
SELECT COUNT(*) AS 'Nombre' FROM employes WHERE id_employes LIKE '5%';

-- 5 -- Afficher le nombre de commerciaux
SELECT COUNT(*) AS 'Nombre' FROM employes WHERE service = 'commercial';

-- 6 -- Afficher le salaire moyen des informaticiens (+arrondie)
SELECT ROUND(AVG(salaire),2) AS 'salaire moyen' FROM employes WHERE service = 'informatique';

-- 7 -- Afficher les 5 premiers employés après avoir classer leur nom de famille par ordre alphabétique
SELECT * FROM employes ORDER BY nom ASC LIMIT 0,5;

-- 8 -- Afficher le cout des commerciaux sur une année
SELECT SUM(salaire*12) AS 'Cout commerciaux' FROM employes WHERE service = 'commercial';

-- 9 -- Afficher le salaire moyen par service (service + salaire moyen)
SELECT service, ROUND(AVG(salaire),2) AS 'salaire moyen par service' FROM employes GROUP BY service;

-- 10 -- Afficher le nombre de recrutement sur l'année 2010
SELECT COUNT(*) AS 'Embauche 2010' FROM employes WHERE date_embauche LIKE '2010%';
SELECT COUNT(*) AS 'Embauche 2010' FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31'; 
SELECT COUNT(*) AS 'Embauche 2010' FROM employes WHERE date_embauche >= '2010-01-01' AND date_embauche <= '2010-12-31'; 

-- 11 -- Afficher le salaire moyen appliqué lors des recrutements sur la période allant de 2005 à 2007
SELECT ROUND(AVG(salaire),2) AS 'Salaire moyen' FROM employes WHERE date_embauche BETWEEN '2005-01-01' AND '2007-12-31';

-- 12 -- Afficher le nombre de service différent
SELECT COUNT(DISTINCT service) AS 'Nb service' FROM employes;

-- 13 -- Afficher tous les employés (sauf ceux du service production et secrétariat)
SELECT nom, prenom, service FROM employes WHERE service != 'production' AND service != 'secretariat'; 
SELECT nom, prenom, service FROM employes WHERE service NOT IN('production', 'secretariat'); 

-- 14 -- Afficher conjoitement le nombre d'hommes et de femmes dans l'entreprise
SELECT sexe, COUNT(*) AS 'Nombre' FROM employes GROUP BY sexe;

-- 15 -- Afficher les commerciaux ayant été recrutés avant 2005 de sexe masculin et gagnant un salaire supérieur à 2500€
SELECT * FROM employes WHERE service = 'commercial' AND date_embauche < '2005-01-01' AND sexe = 'm' AND salaire > 2500;

-- 16 -- Qui a été embauché en dernier ?
SELECT * FROM employes WHERE date_embauche = (SELECT MAX(date_embauche) FROM employes);
SELECT * FROM employes ORDER BY date_embauche DESC LIMIT 0,1;

-- 17 -- Afficher les informations sur l'employé du service commercial gagnant le salaire le plus élevé
SELECT * FROM employes WHERE service = 'commercial' AND salaire = (SELECT MAX(salaire) FROM employes WHERE service = 'commercial');

-- 18 -- Afficher le prénom du comptable gagnant le meilleur salaire
SELECT prenom, MAX(salaire) FROM employes WHERE service = 'comptabilite';
SELECT prenom FROM employes WHERE service = 'comptabilite' AND salaire = (SELECT MAX(salaire) FROM employes WHERE service = 'comptabilite');

-- 19 -- Afficher le prénom de l'informaticien ayant été recruté en premier
SELECT prenom, service, date_embauche FROM employes WHERE service = 'informatique' AND date_embauche = (SELECT MIN(date_embauche) FROM employes WHERE service = 'informatique');

-- 20 -- Augmenter chaque employé de 100€
UPDATE employes SET salaire = salaire + 100;

-- 21 -- Supprimer les employés du service secrétariat 
DELETE FROM employes WHERE service = 'secretariat';