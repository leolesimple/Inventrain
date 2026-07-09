CREATE DATABASE IF NOT EXISTS lesimple_inventrain;
USE lesimple_inventrain;

-- Automation levels
CREATE TABLE automation (
    idAutomation INT AUTO_INCREMENT PRIMARY KEY,
    goaLevel VARCHAR(10) NOT NULL,
    type VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO automation (goaLevel, type) VALUES
('GoA1', 'Conducteur'),
('GoA2', 'Semi-automatique'),
('GoA3', 'Automatique'),
('GoA4', 'Sans conducteur');

-- Train driving systems
CREATE TABLE trainSystem (
    idSystem INT AUTO_INCREMENT PRIMARY KEY,
    system VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO trainSystem (system) VALUES
('KVB'),
('SACEM'),
('ETCS N1'),
('ETCS N2'),
('NCT');

-- Train series
CREATE TABLE series (
    idSerie INT AUTO_INCREMENT PRIMARY KEY,
    serieName VARCHAR(50) NOT NULL,
    altName VARCHAR(50) DEFAULT '',
    serviceStartYear INT,
    capacity INT,
    maxSpeed INT,
    masse INT,
    idAutomation INT,
    idSystem INT,
    FOREIGN KEY (idAutomation) REFERENCES automation(idAutomation),
    FOREIGN KEY (idSystem) REFERENCES trainSystem(idSystem)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO series (serieName, altName, serviceStartYear, capacity, maxSpeed, masse, idAutomation, idSystem) VALUES
('Z5600', 'Z2N', 1983, 500, 140, 210, 1, 1),
('Z8800', 'Z2N', 1985, 500, 140, 210, 1, 1),
('Z20500', 'Z2N', 1989, 500, 140, 220, 1, 1),
('MI79', 'Z8100', 1980, 424, 100, 154, 1, 2),
('MI84', 'Z8400', 1985, 424, 100, 154, 1, 2),
('MI09', NULL, 2011, 512, 120, 172, 1, 2),
('MI2N', 'Z22500', 1996, 614, 120, 270, 1, 1),
('Z5000', 'Francilien', 2009, 450, 140, 195, 1, 3),
('Z58000', 'Regio2N', 2020, 500, 160, 185, 1, 3),
('Z58500', 'Regio2N', 2023, 500, 160, 185, 1, 3),
('B 82500', 'AGC', 2004, 220, 160, 175, 1, 1),
('U52600', 'Tram-Train', 2006, 250, 100, 62, 1, 1),
('U53600', 'Tram-Train', 2014, 250, 100, 65, 1, 1),
('U53700', 'Tram-Train', 2017, 250, 100, 65, 1, 1),
('U53800', 'Tram-Train', 2020, 250, 100, 65, 1, 1),
('VB2N', 'Voiture', 1975, 600, 140, 200, 1, 1),
('BB27300', 'Prima', 2004, 0, 140, 89, 1, 3);

-- Livery
CREATE TABLE livery (
    idLivery INT AUTO_INCREMENT PRIMARY KEY,
    liveryName VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO livery (liveryName) VALUES
('IDFM'),
('STIF/Carmillon'),
('Carmillon'),
('STIF/RATP'),
('RATP'),
('Transilien'),
('IDF'),
('STIF/RATP/SNCF'),
('IDFM/RATP/SNCF'),
('IDF/IDFM/RATP/SNCF');

-- Manufacturer
CREATE TABLE manufacturer (
    idManufacturer INT AUTO_INCREMENT PRIMARY KEY,
    fabricant VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO manufacturer (fabricant) VALUES
('Alstom'),
('Bombardier'),
('CAF'),
('Siemens'),
('ANF Industrie'),
('Franco-Belge'),
('CIMT Lorraine');

-- Network
CREATE TABLE network (
    idNetwork INT AUTO_INCREMENT PRIMARY KEY,
    railNetwork VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO network (railNetwork) VALUES
('RATP'),
('SNCF'),
('SNCF / RATP');

-- Status
CREATE TABLE status (
    idStatus INT AUTO_INCREMENT PRIMARY KEY,
    state VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO status (state) VALUES
('En Service'),
('Maintenance'),
('Renovation'),
('En Cours de Livraison'),
('Radiee');

-- Depot
CREATE TABLE depot (
    idDepot INT AUTO_INCREMENT PRIMARY KEY,
    depotName VARCHAR(100) NOT NULL,
    code VARCHAR(10) NOT NULL,
    city VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO depot (depotName, code, city) VALUES
('Sucy-Bonneuil', 'SB', 'Sucy-en-Brie'),
('Les Ardoines', 'LA', 'Vitry-sur-Seine'),
('Noisy-le-Sec', 'NS', 'Noisy-le-Sec'),
('Joncherolles', 'JO', 'Villetaneuse'),
('Villeneuve-Saint-Georges', 'VSG', 'Villeneuve-Saint-Georges'),
('Acheres', 'AC', 'Acheres'),
('Montrouge', 'MO', 'Montrouge'),
('Massy-Palaiseau', 'MP', 'Massy'),
('La Villette', 'LV', 'Paris'),
('Pantin', 'PA', 'Pantin');

-- Renovation
CREATE TABLE renovation (
    idRenovation INT AUTO_INCREMENT PRIMARY KEY,
    renovationType VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO renovation (renovationType) VALUES
('Aucune'),
('Revisable MI79'),
('Revisable MI84'),
('Remotorisation'),
('Interieur'),
('Accessibilite PMR'),
('Climatisation');

-- Owner
CREATE TABLE owner (
    idOwner INT AUTO_INCREMENT PRIMARY KEY,
    ownerName VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO owner (ownerName) VALUES
('SNCF'),
('RATP'),
('Ile-de-France Mobilites'),
('SNCF / RATP');

-- Line
CREATE TABLE line (
    idLine INT AUTO_INCREMENT PRIMARY KEY,
    LineRef VARCHAR(50) NOT NULL,
    lineName VARCHAR(100),
    letter VARCHAR(5) NOT NULL,
    icon VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO line (LineRef, letter, icon) VALUES
('STIF:Line::C01742:', 'A', 'rer-a.svg'),
('STIF:Line::C01743:', 'B', 'rer-b.svg'),
('STIF:Line::C01727:', 'C', 'rer-c.svg'),
('STIF:Line::C01728:', 'D', 'rer-d.svg'),
('STIF:Line::C01729:', 'E', 'rer-e.svg'),
('STIF:Line::C01737:', 'H', 'train-h.svg'),
('STIF:Line::C01739:', 'J', 'train-j.svg'),
('STIF:Line::C01738:', 'K', 'train-k.svg'),
('STIF:Line::C01740:', 'L', 'train-l.svg'),
('STIF:Line::C01736:', 'N', 'train-n.svg'),
('STIF:Line::C01730:', 'P', 'train-p.svg'),
('STIF:Line::C01731:', 'R', 'train-r.svg'),
('STIF:Line::C01741:', 'U', 'train-u.svg'),
('STIF:Line::C02711:', 'V', 'train-v.svg');

-- Train
CREATE TABLE train (
    idTrain INT AUTO_INCREMENT PRIMARY KEY,
    number VARCHAR(50) NOT NULL,
    idSerie INT NOT NULL,
    idLivery INT NOT NULL,
    idManufacturer INT NOT NULL,
    deliveryDate DATE,
    radiationDate DATE DEFAULT NULL,
    idNetwork INT NOT NULL,
    idStatus INT NOT NULL,
    idDepot INT NOT NULL,
    idRenovation INT DEFAULT NULL,
    idOwner INT NOT NULL,
    incidents TEXT DEFAULT NULL,
    FOREIGN KEY (idSerie) REFERENCES series(idSerie),
    FOREIGN KEY (idLivery) REFERENCES livery(idLivery),
    FOREIGN KEY (idManufacturer) REFERENCES manufacturer(idManufacturer),
    FOREIGN KEY (idNetwork) REFERENCES network(idNetwork),
    FOREIGN KEY (idStatus) REFERENCES status(idStatus),
    FOREIGN KEY (idDepot) REFERENCES depot(idDepot),
    FOREIGN KEY (idRenovation) REFERENCES renovation(idRenovation),
    FOREIGN KEY (idOwner) REFERENCES owner(idOwner)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Train-Line junction
CREATE TABLE train_line (
    idTrain INT NOT NULL,
    idLine INT NOT NULL,
    PRIMARY KEY (idTrain, idLine),
    FOREIGN KEY (idTrain) REFERENCES train(idTrain) ON DELETE CASCADE,
    FOREIGN KEY (idLine) REFERENCES line(idLine)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample data
INSERT INTO train (number, idSerie, idLivery, idManufacturer, deliveryDate, idNetwork, idStatus, idDepot, idRenovation, idOwner, incidents) VALUES
('3540', 4, 1, 1, '1980-06-15', 1, 1, 1, 1, 1, NULL),
('3546', 4, 1, 1, '1980-09-20', 1, 1, 1, 2, 1, NULL),
('8243/4', 4, 1, 1, '1982-03-10', 1, 1, 1, 2, 1, 'Rame ayant subi l''attentat de la station Saint-Michel en 1995. Remise en service apres renovation.'),
('001H', 8, 1, 2, '2010-02-18', 2, 1, 6, 1, 1, NULL),
('002H', 8, 1, 2, '2010-03-22', 2, 1, 6, 1, 1, NULL),
('27354', 7, 1, 1, '1997-11-05', 1, 1, 5, 3, 1, NULL),
('34C', 5, 1, 1, '1986-01-15', 1, 5, 1, 1, 1, NULL),
('TT456', 12, 4, 3, '2007-08-10', 2, 1, 8, 1, 2, NULL);

INSERT INTO train_line (idTrain, idLine) VALUES
(1, 1), (1, 2),
(2, 1),
(3, 2),
(4, 6),
(5, 6),
(6, 4),
(7, 1),
(8, 11);
