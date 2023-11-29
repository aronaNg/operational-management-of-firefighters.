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

DELIMITER $$

CREATE TRIGGER trig_archiveequip
AFTER DELETE ON type_equipements
FOR EACH ROW
BEGIN
    INSERT INTO table_historiqueequip (id, intitule)
    VALUES (OLD.id, OLD.intitule);
END$$

DELIMITER ;
