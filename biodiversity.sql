CREATE TABLE user(	
	UserID INTEGER AUTO_INCREMENT,
	Name VARCHAR(30) NOT NULL,
	Email VARCHAR(40) NOT NULL,
	Password VARCHAR(10) NOT NULL,
	joindate TIMESTAMP DEFAULT  CURRENT_TIMESTAMP,
	PRIMARY KEY (UserID),
	UNIQUE (Email)
);


CREATE TABLE organism( 	
	Species VARCHAR(30),
	OrganismName VARCHAR(30),
	Habitat VARCHAR(30),
	PRIMARY KEY (Species)
);


CREATE TABLE organism_Variation(	
	Species VARCHAR(30), 
	PrimaryColor VARCHAR(10) NOT NULL,
	Rarity VARCHAR(20),
	PRIMARY KEY (Species, PrimaryColor),
	FOREIGN KEY (Species) REFERENCES organism (species)
);

CREATE TABLE fungus(	
	Species VARCHAR(30),
	Edibility VARCHAR(10) DEFAULT 'Inedible', 
	Texture VARCHAR(20),
	FungusSize INTEGER,
	Smell VARCHAR(20),
	PRIMARY KEY (Species),
	FOREIGN KEY (Species) REFERENCES organism(species)
);


CREATE TABLE produces_Toxin(	
	Species VARCHAR(30),
	Chemical VARCHAR(30),
	Onset VARCHAR(10) NOT NULL,
	Toxicity VARCHAR(10) NOT NULL,
	Treatment VARCHAR(50),
	PRIMARY KEY (Species, Chemical),
	FOREIGN KEY (Species) REFERENCES Fungus(species)
);

CREATE TABLE plant(	
	Species VARCHAR(30), 
	FlowerColor VARCHAR(20) DEFAULT 'Non-flowering', 
	Calories VARCHAR(50) DEFAULT 'Inedible', 
	PRIMARY KEY (Species),
	FOREIGN KEY (Species) REFERENCES Organism(species)
);

CREATE TABLE plant_Fruit(	
	Species VARCHAR(30), 
	FruitName VARCHAR(30), 
	Calories VARCHAR(50) DEFAULT 'Inedible', 
	PRIMARY KEY (Species, FruitName),
	FOREIGN KEY (Species) REFERENCES Plant(species)
);

CREATE TABLE animal(	
	Species VARCHAR(30),
	PrimaryDiet VARCHAR(20) NOT NULL,
	Aggresiveness VARCHAR(10),
	Health VARCHAR(20),
	Sound VARCHAR(30),
	PRIMARY KEY (Species),
	FOREIGN KEY (Species) REFERENCES Organism(species)
);

CREATE TABLE organism_Dependence( 	
	Species_Dependant VARCHAR(30),
	Species_Dependee VARCHAR(30),
	PRIMARY KEY (Species_Dependant, Species_Dependee),
	FOREIGN KEY (Species_Dependant) REFERENCES Organism(Species),
	FOREIGN KEY (Species_Dependee) REFERENCES Organism(Species)
);

CREATE TABLE animal_Eats( 	
	Species_Eats VARCHAR(30),
	Species_Eaten VARCHAR(30),
	PRIMARY KEY (Species_Eats, Species_Eaten),
	FOREIGN KEY (Species_Eats) REFERENCES Organism(Species),
	FOREIGN KEY (Species_Eaten) REFERENCES Organism(Species)
);

CREATE TABLE location(	
	LocationName VARCHAR(30),
	Address VARCHAR(100),
	Environment VARCHAR(100),
	PRIMARY KEY (LocationName)
);


CREATE TABLE location_Maintenance(	
	LocationName VARCHAR(30),
	MaintenanceID INTEGER AUTO_INCREMENT,
	Schedule Date,
	Task VARCHAR(30),
	PRIMARY KEY (MaintenanceID),
	FOREIGN KEY (LocationName) REFERENCES Location(locationName)
);


CREATE TABLE location_Remodel(	
	LocationName VARCHAR(30),
	ConstructionID INTEGER AUTO_INCREMENT,
	Infrastructure VARCHAR(30),
	ExpectedDate Date,
	RemodelDate Date,
	PRIMARY KEY (ConstructionID),
	FOREIGN KEY (LocationName) REFERENCES Location(locationName)
);

CREATE TABLE sighting_Report(	
	SID INTEGER AUTO_INCREMENT,
	LocationName VARCHAR(30) NOT NULL,
	Species  VARCHAR(30),
	UserID INTEGER,
	ReportDate TIMESTAMP DEFAULT  CURRENT_TIMESTAMP,
	PRIMARY KEY (SID),
	FOREIGN KEY (UserID) REFERENCES user(userid),
	FOREIGN KEY (LocationName) REFERENCES Location(locationname),
	FOREIGN KEY (Species) REFERENCES Organism(species)
);
