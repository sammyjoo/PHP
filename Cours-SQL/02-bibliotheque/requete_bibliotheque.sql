-- ########################################### REQUETE BIBLIOTHEQUE ################################################

-- ############################################# REQUETE IMBRIQUEE #####################################################

-- Afficher les ID des livres qui n'ont pas été rendus à la bibliothèque
-- Un champ NULL se teste toujours avec le mot-clé 'IS'
SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;

-- Affichage du/des titre(s) des livres qui n'ont pas été rendus 
SELECT titre FROM livre WHERE id_livre IN 
    (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- 1ère étape
SELECT titre FROM livre WHERE id_livre IN (100, 105);

/* La requête entre parenthèses est exécutée en premier, on selectionne dans la table 'emprunt' les ID des livres non rendus. Puis la seconde requête est exécutée, nous selectionnons le titre des livres dans la table 'livre'

Pour faire des relations entre les tables, il faut obligatoirement avoir un champ commun. Ici, dans notre cas, le champ commun est 'id_livre' */


-- Affichage de la liste des prénoms des abonnés n'ayant pas rendu des livres à la bibliothèque
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM EMPRUNT WHERE date_rendu IS NULL);

-- Etape
SELECT prenom FROM abonne WHERE id_abonne IN (3,2);


-- EXO: Nous aimerions connaître le ID des livres que Chloé a emprunté à la bibliothèque
SELECT id_livre FROM emprunt WHERE id_abonne IN
    (SELECT id_abonne FROM abonne WHERE prenom = 'Chloe');

-- EXO: Afficher les prénoms des abonnés ayant emprunté un livre le 19/12/2014
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt WHERE date_sortie = '2014-12-19');

--  Etape
SELECT prenom FROM abonne WHERE id_abonne IN (3,4,1);

-- EXO: combien de livre(s) Guillaume a emprunté à la bibliothèque ?
SELECT COUNT(id_abonne) FROM emprunt WHERE id_abonne IN
    (SELECT id_abonne FROM abonne WHERE prenom = 'Guillaume');

-- EXO: Afficher la liste des abonnés ayant emprunté un livre d'Alphonse Daudet
SELECT prenom FROM abonne WHERE id_abonne IN   
    (SELECT id_abonne FROM emprunt WHERE id_livre IN
        (SELECT id_livre FROM livre WHERE auteur = 'ALPHONSE DAUDET'));

-- Etape 1 :
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt WHERE id_livre IN(103));

-- Etape 2 :
SELECT prenom FROM abonne WHERE id_abonne IN(4);


-- EXO: Qui a emprunté le plus de livres à la bibliothèque ?
SELECT prenom FROM abonne WHERE id_abonne =
    (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1); 


-- ######################################### JOINTURE ###############################################

-- Une jointure est une requête imbriquée permettant de faire des relations entre les différentes tables afin d'avoir des colonnes associées pour ne former qu'un seul résultat

-- Une jointure est possible dans tous les cas
-- Une requête imbriquée est possible seulement dans le cas où le résultat est issu de la même table 

-- Exemple: nous aimerions connaître les dates de sorties et de rendu pour l'abonné 'Guillaume'
--Jointure implicite
SELECT a.prenom, e.date_sortie, e.date_rendu -- 1ère ligne: liste des champs que je souhaite afficher dans mon résultat
FROM abonne a, emprunt e -- 2ème ligne: De quelle(s) table(s) cela provient et quelle(s) table(s) je vais en avoir besoin
WHERE a.id_abonne = e.id_abonne -- 3ème ligne: condition, quel est le champ commun entre les deux tables qui me permet d'effectuer la jointure
AND a.prenom = 'Guillaume'; -- 4ème ligne: condition complémentaire 

-- a.prenom: 'a' est un préfixe qui correspond à la table 'abonne'


-- EXO: Qui a emprunté le livre "Une vie" sur l'année 2014 ?
-- Jointure
SELECT a.prenom, l.titre, e.date_sortie, e.date_rendu
FROM abonne a, livre l, emprunt e
WHERE a.id_abonne = e.id_abonne 
AND e.id_livre = l.id_livre
AND e.date_sortie LIKE '2014%'
AND l.titre = 'Une vie';

SELECT a.prenom, l.titre, e.date_sortie, e.date_rendu
FROM  abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne 
INNER JOIN livre l
ON e.id_livre = l.id_livre
AND e.date_sortie LIKE '2014%'
AND l.titre = 'Une vie';

-- Requête imbriquée
SELECT prenom FROM abonne WHERE id_abonne IN
    (SELECT id_abonne FROM emprunt WHERE date_sortie LIKE '2014%' AND id_livre IN 
        (SELECT id_livre FROM livre WHERE titre = 'Une vie'));


-- EXO: Afficher le nombre de livre(s) emprunté par chaque abonné
SELECT a.prenom, COUNT(e.id_livre) AS 'Nb de livres empruntes'
FROM abonne a, emprunt e 
WHERE a.id_abonne = e.id_abonne
GROUP BY e.id_abonne;

SELECT a.prenom, COUNT(e.id_livre) AS 'Nb de livres empruntes'
FROM abonne a 
INNER JOIN emprunt e 
ON a.id_abonne = e.id_abonne
GROUP BY e.id_abonne;

SELECT a.prenom, COUNT(e.id_livre) AS 'Nb de livres empruntes'
FROM abonne a 
NATURAL JOIN emprunt e 
GROUP BY e.id_abonne;

-- NATURAL JOIN: Il faut que les champs entre les tables soient identiques

-- EXO: Afficher le nombre de livres et les prénoms des abonnés qui n'ont pas rendu les livres à la bilbiothèque
SELECT a.prenom, COUNT(e.date_rendu) AS 'Nb de livres non rendus'
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne
AND e.date_rendu IS NULL
GROUP BY a.id_abonne;


-- EXO: Qui a emprunté quoi ? et quand ? (titre des livres, à quelle date et savoir par qui)
SELECT a.prenom, e.id_livre, e.date_sortie, l.auteur, l.titre 
FROM abonne a, emprunt e, livre l
WHERE a.id_abonne = e.id_abonne 
AND e.id_livre = l.id_livre;

SELECT a.prenom, e.id_livre, e.date_sortie, l.auteur, l.titre 
FROM  abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne 
INNER JOIN  livre l
ON e.id_livre = l.id_livre;

SELECT a.prenom, e.id_livre, e.date_sortie, l.auteur, l.titre 
FROM abonne a 
NATURAL JOIN emprunt e 
NATURAL JOIN livre l;
