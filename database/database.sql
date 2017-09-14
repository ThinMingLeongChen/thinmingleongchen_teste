CREATE DATABASE shared_races;

CREATE TABLE driver (
    id_driver INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_driver VARCHAR(80) NOT NULL,
    birthdate_driver DATE NOT NULL,
    cpf_driver VARCHAR(11) NOT NULL,
    carmodel_driver VARCHAR(80) NOT NULL,
    status_driver TINYINT(1) NOT NULL,
    gender_driver CHAR(1) NOT NULL,
    date_register DATETIME NOT NULL DEFAULT NOW(),
    date_changes DATETIME NULL
)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

CREATE TABLE passenger (
    id_passenger INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_passenger VARCHAR(80) NOT NULL,
    birthdate_passenger DATE NOT NULL,
    cpf_passenger VARCHAR(11) NOT NULL,
    gender_passenger CHAR(1) NOT NULL,
    date_register DATETIME NOT NULL DEFAULT NOW(),
    date_changes DATETIME NULL
)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

CREATE TABLE ride (
    id_ride INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_driver INT NOT NULL,
    value_ride DECIMAL(8,2) NOT NULL,
    date_ride DATETIME NOT NULL DEFAULT NOW(),
    date_changes DATETIME NULL
    FOREIGN KEY (id_driver) REFERENCES driver (id_driver)
)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

CREATE TABLE ride_passenger (
    id_ride INT NOT NULL,
    id_passenger INT NOT NULL,
    FOREIGN KEY (id_ride) REFERENCES ride (id_ride),
    FOREIGN KEY (id_passenger) REFERENCES passenger (id_passenger)
)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

delimiter //
CREATE TRIGGER delete_ride AFTER DELETE ON ride  
FOR EACH ROW     
BEGIN
DELETE FROM ride_passenger 
    WHERE id_ride = OLD.id_ride;
END; //
delimiter ;