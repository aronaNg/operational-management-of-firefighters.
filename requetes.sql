-- historisation pour la table type véhicule
-- DELIMITER $$

-- CREATE TRIGGER trig_archive
-- AFTER DELETE ON type_vehicules
-- FOR EACH ROW
-- BEGIN
--     INSERT INTO table_historique (id, intitule)
--     VALUES (OLD.id, OLD.intitule);
-- END$$

-- DELIMITER ;

-- historisation pour la table type incidents

-- DELIMITER $$

-- CREATE TRIGGER trig_archiveinci
-- AFTER DELETE ON type_incidents
-- FOR EACH ROW
-- BEGIN
--     INSERT INTO table_historiqueinci (id, intitule)
--     VALUES (OLD.id, OLD.intitule);
-- END$$

-- DELIMITER ;

-- historisation pour la table type equipement

-- DELIMITER $$

-- CREATE TRIGGER trig_archiveequip
-- AFTER DELETE ON type_equipements
-- FOR EACH ROW
-- BEGIN
--     INSERT INTO table_historiqueequip (id, intitule)
--     VALUES (OLD.id, OLD.intitule);
-- END$$

-- DELIMITER ;

-- interventions
-- DELIMITER //

-- CREATE EVENT IF NOT EXISTS insert_event
-- ON SCHEDULE EVERY 1 MINUTE
-- DO
--   BEGIN
--     INSERT INTO intervention (id, statut, date_heure, id_type_incident, id_pompier, id_vehicule, id_equipement)
--     VALUES (NULL, 'En cours', NOW(),
--             FLOOR(1 + RAND() * 10),
--             FLOOR(1 + RAND() * 10),
--             FLOOR(1 + RAND() * 10),
--             FLOOR(1 + RAND() * 10));
--   END //

-- DELIMITER ;
