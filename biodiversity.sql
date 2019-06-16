CREATE TABLE users(	
	UserID NUMBER GENERATED ALWAYS AS IDENTITY,
	Name VARCHAR(30) NOT NULL,
	Email VARCHAR(40) NOT NULL,
	Password VARCHAR(10) NOT NULL,
	joindate TIMESTAMP DEFAULT SYSTIMESTAMP,
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
	FOREIGN KEY (Species) REFERENCES organism
);

CREATE TABLE fungus(	
	Species VARCHAR(30),
	Edibility VARCHAR(10) DEFAULT 'Inedible', 
	Texture VARCHAR(20),
	FungusSize INTEGER,
	Smell VARCHAR(20),
	PRIMARY KEY (Species),
	FOREIGN KEY (Species) REFERENCES organism
);


CREATE TABLE produces_Toxin(	
	Species VARCHAR(30),
	Chemical VARCHAR(30),
	Onset VARCHAR(10) NOT NULL,
	Toxicity VARCHAR(10) NOT NULL,
	Treatment VARCHAR(50),
	PRIMARY KEY (Species, Chemical),
	FOREIGN KEY (Species) REFERENCES Fungus
);

CREATE TABLE plant(	
	Species VARCHAR(30), 
	FlowerColor VARCHAR(20) DEFAULT 'Non-flowering', 
	Calories VARCHAR(50) DEFAULT 'Inedible', 
	PRIMARY KEY (Species),
	FOREIGN KEY (Species) REFERENCES Organism
);

CREATE TABLE plant_Fruits(	
	Species VARCHAR(30), 
	FruitName VARCHAR(30), 
	Calories VARCHAR(50) DEFAULT 'Inedible', 
	PRIMARY KEY (Species, FruitName),
	FOREIGN KEY (Species) REFERENCES Plant
);

CREATE TABLE animal(	
	Species VARCHAR(30),
	PrimaryDiet VARCHAR(20) NOT NULL,
	Aggresiveness VARCHAR(10),
	Health VARCHAR(20),
	Sound VARCHAR(30),
	PRIMARY KEY (Species),
	FOREIGN KEY (Species) REFERENCES Organism
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
	MaintenanceID NUMBER GENERATED ALWAYS AS IDENTITY,
	Schedule Date,
	Task VARCHAR(30),
	PRIMARY KEY (LocationName, MaintenanceID),
	FOREIGN KEY (LocationName) REFERENCES Location
);


CREATE TABLE location_Remodel(	
	LocationName VARCHAR(30),
	ConstructionID NUMBER GENERATED ALWAYS AS IDENTITY,
	Infrastructure VARCHAR(30),
	ExpectedDate Date,
	RemodelDate Date,
	PRIMARY KEY (ConstructionID),
	FOREIGN KEY (LocationName) REFERENCES Location
);

CREATE TABLE sighting_Report(	
	SID NUMBER GENERATED ALWAYS AS IDENTITY,
	LocationName VARCHAR(30) NOT NULL,
	Species  VARCHAR(30),
	UserID NUMBER,
	ReportDate TIMESTAMP DEFAULT SYSTIMESTAMP,
	PRIMARY KEY (SID),
	FOREIGN KEY (UserID) REFERENCES Users,
	FOREIGN KEY (LocationName) REFERENCES Location,
	FOREIGN KEY (Species) REFERENCES Organism
);
