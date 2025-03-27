CREATE TABLE series (
                        idSerie INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100),
                        serviceStartYear YEAR
);

CREATE TABLE livery (
                        idLivery INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100)
);

CREATE TABLE manufacturer (
                              idManufacturer INT AUTO_INCREMENT PRIMARY KEY,
                              name VARCHAR(100)
);

CREATE TABLE voltage (
                         idVoltage INT AUTO_INCREMENT PRIMARY KEY,
                         value VARCHAR(50)
);

CREATE TABLE network (
                         idNetwork INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(100)
);

CREATE TABLE line (
                      idLine INT AUTO_INCREMENT PRIMARY KEY,
                      name VARCHAR(100)
);

CREATE TABLE depot (
                       idDepot INT AUTO_INCREMENT PRIMARY KEY,
                       name VARCHAR(100),
                       code VARCHAR(10)
);

CREATE TABLE status (
                        idStatus INT AUTO_INCREMENT PRIMARY KEY,
                        state VARCHAR(100)
);

CREATE TABLE renovation (
                            idRenovation INT AUTO_INCREMENT PRIMARY KEY,
                            renovationDate DATE,
                            renovationType VARCHAR(100)
);

CREATE TABLE trainSystem (
                        idSystem INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100)
);

CREATE TABLE automation (
                            idAutomation INT AUTO_INCREMENT PRIMARY KEY,
                            goaLevel VARCHAR(10),
                            type VARCHAR(100)
);

CREATE TABLE train (
                       idTrain INT AUTO_INCREMENT PRIMARY KEY,
                       number VARCHAR(50),
                       idSerie INT,
                       owner VARCHAR(100),
                       idLivery INT,
                       idManufacturer INT,
                       deliveryDate DATE,
                       idVoltage INT,
                       power INT,
                       capacity INT,
                       maxSpeed INT,
                       acceleration DECIMAL(5,2),
                       idNetwork INT,
                       idStatus INT,
                       idDepot INT,
                       idRenovation INT,
                       incidents TEXT,
                       idSystem INT,
                       idAutomation INT,
                       FOREIGN KEY (idSerie) REFERENCES series(idSerie),
                       FOREIGN KEY (idLivery) REFERENCES livery(idLivery),
                       FOREIGN KEY (idManufacturer) REFERENCES manufacturer(idManufacturer),
                       FOREIGN KEY (idVoltage) REFERENCES voltage(idVoltage),
                       FOREIGN KEY (idNetwork) REFERENCES network(idNetwork),
                       FOREIGN KEY (idStatus) REFERENCES status(idStatus),
                       FOREIGN KEY (idDepot) REFERENCES depot(idDepot),
                       FOREIGN KEY (idRenovation) REFERENCES renovation(idRenovation),
                       FOREIGN KEY (idSystem) REFERENCES trainSystem(idSystem),
                       FOREIGN KEY (idAutomation) REFERENCES automation(idAutomation)
);

CREATE TABLE trainLine (
                           idTrain INT,
                           idLine INT,
                           PRIMARY KEY (idTrain, idLine),
                           FOREIGN KEY (idTrain) REFERENCES train(idTrain),
                           FOREIGN KEY (idLine) REFERENCES line(idLine)
);
