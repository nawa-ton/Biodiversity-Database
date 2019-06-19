drop table organism_Variation;

drop table produces_Toxin;

drop table fungus;

drop table plant_Fruit;

drop table plant;

drop table organism_Dependence;

drop table animal_Eats;

drop table animal;

drop table location_Maintenance;

drop table location_Remodel;

drop table sighting_Report;

drop table location;

drop table user;

drop table organism;

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


insert into User (Name,	Email, Password) values ('Adam Smith', 'asmith@gmail.com', '123abc');

insert into User (Name,	Email, Password) values ('Betty White', 'bwhite@gmail.com', '123abc');

insert into User (Name,	Email, Password) values ('Cinda Zhou', 'czhou@hotmail.com', '123abc');

insert into User (Name,	Email, Password) values ('Minnie Lee', 'mlee@hotmail.com', '123abc');

insert into User (Name, Email, Password) values ('Brian Parker', 'bpark@gmail.com', '123abc');


insert into Organism values ('Sciurus carolinensis', 'Eastern Grey Squirrel', 'hardwood forests');

insert into Organism values ('Pandion haliaetus', 'Osprey', 'near bodies of water');

Insert into Organism values ('Salvelinus fontinalis', 'Brook trout', 'freshwater streams and lakes');

insert into Organism values ('Taraxacum officinale', 'Dandelion', 'temperate regions');

insert into Organism values ('Quercus alba', 'white oak', 'open forests');

insert into Organism values ('Amanita phalloides', 'Death Cap', 'mycorhizal with hardwood trees');

insert into Organism values ('Psilocybe semilanceata', 'magic mushroom', 'grassland');

insert into Organism values ('Armillaria mellea', 'honey fungus', 'parasitical on broadleaf trees');

insert into Organism values ('Procyon lotor', 'North American racoon', 'forest or urban area');

insert into Organism values ('Passer domesticus', 'House sparrow', 'parks/gardens');

insert into Organism values ('Physocarpus capitatus', 'Pacific ninebark', 'wet environments');

insert into Organism values ('Rosa nutkana', 'Nootka Rose', 'near salt water');

insert into Organism values ('Calochortus macrocarpus', 'Mariposa Lily', 'open forests');

insert into Organism values ('Amanita muscaria', 'Fly Agaric', 'conifer and deciduous woodlands');

insert into Organism values ('Russula xerampelina', 'crab brittlegill', 'conifer and deciduous woodlands');

insert into Organism values ('Danaus plexippus', 'Monarch butterfly', 'open fields and meadows');

insert into Organism values ('Larus glaucescens', 'Glaucus-winged gull', 'near bodies of water');

insert into Organism values ('Glaucomys sabrinus', 'Northern flying squirrel', 'coniferous forests');

insert into Organism values ('Equus magicalus', 'Unicorn', 'anywhere');

insert into Organism values ('Equus llamas', 'Magic Llama', 'meadows');

insert into Organism values ('Equus taurus', 'Vore Cattle', 'open fields');


insert into Organism_Variation values ('Sciurus carolinensis', 'grey', 'Common');

insert into Organism_Variation values('Pandion haliaetus', 'brown', 'rare');

insert into Organism_Variation values('Salvelinus fontinalis', 'green', 'common');

insert into Organism_Variation values ('Taraxacum officinale', 'yellow', 'common');

insert into Organism_Variation values ('Quercus alba', 'green', 'rare');

insert into Organism_Variation values ('Amanita phalloides', 'white', 'common');

insert into Organism_Variation values ('Psilocybe semilanceata', 'brown', 'rare');

insert into Organism_Variation values ('Pandion haliaetus', 'grey', 'rare');

insert into Organism_Variation values ('Salvelinus fontinalis', 'rainbow', 'rare');

insert into Organism_Variation values ('Armillaria mellea', 'yellow', 'common');

insert into Organism_Variation values ('Psilocybe semilanceata', 'white', 'common');

insert into Organism_Variation values ('Amanita phalloides', 'grey', 'common');

insert into Organism_Variation values ('Procyon lotor', 'grey', 'common');

insert into Organism_Variation values ('Procyon lotor', 'black', 'common');

insert into Organism_Variation values ('Procyon lotor', 'reddish', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'grey', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'brown', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'green', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'yellow', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'white', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'rainbow', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'grey and black', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'reddish', 'rare');

insert into Organism_Variation values ('Equus magicalus', 'black', 'rare');



insert into Animal values ('Sciurus carolinensis', 'nuts', 'docile', 'healthy','squeak');

insert into Animal values ('Pandion haliaetus', 'fish', 'aggressive', 'healthy', 'chirp');

insert into Animal values ('Salvelinus fontinalis', 'fish', 'docile', 'healthy', NULL);

insert into Animal values ('Procyon lotor', 'fish', 'aggressive', 'healthy', 'chitter');

insert into Animal values ('Larus glaucescens', 'fish', 'docile', 'healthy', 'soft ga-ga');

insert into Animal values ('Glaucomys sabrinus', 'nuts', 'docile', 'healthy', 'squeak');

insert into Animal values ('Passer domesticus', 'seeds', 'docile', 'healthy', 'chirp');

insert into Animal values ('Equus magicalus', 'all', 'aggresive', 'healthy', 'neigh');

insert into Animal values ('Equus llamas', 'fungus', 'docile', 'healthy', 'neigh');

insert into Animal values ('Equus taurus', 'vegetation', 'docile', 'healthy', 'moo');

insert into Animal values ('Danaus plexippus', 'nectar', 'docile', 'healthy', NULL); 


insert into Animal_Eats values ('Pandion haliaetus', 'Salvelinus fontinalis');

insert into Animal_Eats values ('Larus glaucescens', 'Salvelinus fontinalis');

insert into Animal_Eats values ('Procyon lotor', 'Salvelinus fontinalis');

insert into Animal_Eats values ('Passer domesticus', 'Taraxacum officinale');

insert into Animal_Eats values ('Procyon lotor', 'Taraxacum officinale');


insert into Animal_Eats values ('Equus magicalus', 'Danaus plexippus');
insert into Animal_Eats values ('Equus magicalus', 'Equus magicalus');
insert into Animal_Eats values ('Equus magicalus', 'Glaucomys sabrinus');
insert into Animal_Eats values ('Equus magicalus', 'Larus glaucescens');
insert into Animal_Eats values ('Equus magicalus', 'Pandion haliaetus');
insert into Animal_Eats values ('Equus magicalus', 'Passer domesticus');
insert into Animal_Eats values ('Equus magicalus', 'Procyon lotor');
insert into Animal_Eats values ('Equus magicalus', 'Salvelinus fontinalis');
insert into Animal_Eats values ('Equus magicalus', 'Sciurus carolinensis');

insert into Animal_Eats values ('Equus magicalus', 'Taraxacum officinale');
insert into Animal_Eats values ('Equus magicalus', 'Rosa nutkana');
insert into Animal_Eats values ('Equus magicalus', 'Quercus alba');
insert into Animal_Eats values ('Equus magicalus', 'Physocarpus capitatus');
insert into Animal_Eats values ('Equus magicalus', 'Calochortus macrocarpus');

insert into Animal_Eats values ('Equus magicalus', 'Amanita muscaria');
insert into Animal_Eats values ('Equus magicalus', 'Amanita phalloides');
insert into Animal_Eats values ('Equus magicalus', 'Armillaria mellea');
insert into Animal_Eats values ('Equus magicalus', 'Psilocybe semilanceata');
insert into Animal_Eats values ('Equus magicalus', 'Russula xerampelina');

insert into Animal_Eats values ('Equus llamas', 'Amanita muscaria');
insert into Animal_Eats values ('Equus llamas', 'Amanita phalloides');
insert into Animal_Eats values ('Equus llamas', 'Armillaria mellea');
insert into Animal_Eats values ('Equus llamas', 'Psilocybe semilanceata');
insert into Animal_Eats values ('Equus llamas', 'Russula xerampelina');

insert into Animal_Eats values ('Equus taurus', 'Taraxacum officinale');
insert into Animal_Eats values ('Equus taurus', 'Rosa nutkana');
insert into Animal_Eats values ('Equus taurus', 'Quercus alba');
insert into Animal_Eats values ('Equus taurus', 'Physocarpus capitatus');
insert into Animal_Eats values ('Equus taurus', 'Calochortus macrocarpus');

insert into Animal_Eats values ('Equus taurus', 'Amanita muscaria');
insert into Animal_Eats values ('Equus taurus', 'Amanita phalloides');
insert into Animal_Eats values ('Equus taurus', 'Armillaria mellea');
insert into Animal_Eats values ('Equus taurus', 'Psilocybe semilanceata');
insert into Animal_Eats values ('Equus taurus', 'Russula xerampelina');

insert into Plant values ('Taraxacum officinale', 'yellow', 45);

insert into Plant values ('Quercus alba', 'green', 'inedible');

insert into Plant values ('Physocarpus capitatus', 'white', 'inedible');

insert into Plant values ('Rosa nutkana', 'pink', 'indedible');

insert into Plant values ('Calochortus macrocarpus', 'pink', 'indedible');


insert into Plant_Fruit values ('Taraxacum officinale', 'dandelion fruit', 45);

insert into Plant_Fruit values ('Quercus alba', 'acorn', 143);

insert into Plant_Fruit values ('Physocarpus capitatus', 'ninebark pods', 'inedible');

insert into Plant_Fruit values ('Rosa nutkana', 'rosehip', 162);

insert into Plant_Fruit values ('Calochortus macrocarpus', 'pods', 'indedible');


insert into Fungus values('Amanita phalloides', 'inedible', 'smooth', 15, 'overpowering');

insert into Fungus values('Psilocybe semilanceata', 'inedible', 'smooth', 2,  'musty');

insert into Fungus values('Armillaria mellea', 'edible', 'smooth', 10, 'mushroomy');

insert into Fungus values ('Amanita muscaria', 'inedible', 'bumpy', 6, 'mild earthiness');

insert into Fungus values ('Russula xerampelina', 'edible', 'smooth', 8, 'crab');


insert into Produces_Toxin values('Psilocybe semilanceata', 'psilocybin', 'moderate', 'moderate', NULL);

insert into Produces_Toxin values ('Amanita phalloides', 'Amatoxin', 'fast', 'high', 'penicillin');

insert into Produces_Toxin values ('Amanita muscaria', 'Muscimol', 'moderate', 'moderate', NULL);

insert into Produces_Toxin values ('Russula xerampelina', 'toxin', 'moderate', 'moderate', NULL);

insert into Produces_Toxin values ('Armillaria mellea', 'toxin', 'moderate', 'moderate', NULL);


insert into Organism_Dependence values ('Armillaria mellea', 'Quercus alba');

insert into Organism_Dependence values ('Rosa nutkana', 'Danaus plexippus');

insert into Organism_Dependence values ('Calochortus macrocarpus', 'Danaus plexippus');

insert into Organism_Dependence values ('Pandion haliaetus', 'Salvelinus fontinalis');

insert into Organism_Dependence values ('Larus glaucescens', 'Salvelinus fontinalis');


insert into Location values ('Sally Lake', '1753 Water Way', 'lake');

insert into Location values ('Lumin Stream', '1753 Water Way', 'stream');

insert into Location values ('Woody Forest', '2344 Terrestrial Ave', 'forest');

insert into Location values ('High Rocks', '2768 Terrestrial Ave', 'mountain');

insert into Location values ('Green Kiosk', '2457 Terrestrial Ave', 'meadow');

insert into Location values ('Norquay Park', '2324 Terrestrial Ave', 'park');

insert into Location values ('Central Garden', '2459 Terrestrial Ave', 'garden');


insert into Location_Maintenance (LocationName, Schedule, Task) values ('Central Garden', '2019-02-06', 'Cutting grass');

insert into Location_Maintenance (LocationName, Schedule, Task) values ('Norquay Park', '2019-12-23', 'Collecting garbage');

insert into Location_Maintenance (LocationName, Schedule, Task) values ('Green Kiosk', '2019-11-03', 'Raking leaves');

insert into Location_Maintenance (LocationName, Schedule, Task) values ('High Rocks', '2019-02-13', 'Painting benches');

insert into Location_Maintenance (LocationName, Schedule, Task) values ('Woody Forest', '2019-05-12', 'Clearing fallen branches');


insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Central Garden', 'rose garden', '2019-03-03', '2019-05-05');

insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Norquay Park', 'information kiosk', '2019-04-01', '2019-04-30');

insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Green Kiosk', 'gazebo', '2019-04-20', '2019-04-30');

insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Woody Forest', 'treehouse', '2019-06-01', '2019-07-20');

insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Norquay Park', 'fountain', '2019-10-10', '2019-10-10');



insert into Sighting_Report (LocationName, Species, UserID) values ('Lumin Stream', 'Salvelinus fontinalis', 1);

insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Sciurus carolinensis', 1);

insert into Sighting_Report (LocationName, Species, UserID) values ('Sally Lake', 'Pandion haliaetus',  2);

insert into Sighting_Report (LocationName, Species, UserID) values ('Central Garden', 'Taraxacum officinale', 2);

insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Quercus alba',  3);

insert into Sighting_Report (LocationName, Species, UserID) values ('Norquay Park', 'Amanita phalloides', 3);

insert into Sighting_Report (LocationName, Species, UserID) values ('Norquay Park', 'Psilocybe semilanceata', 3);

insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Armillaria mellea', 3);

insert into Sighting_Report (LocationName, Species, UserID) values ('Sally Lake', 'Equus magicalus', 1);

insert into Sighting_Report (LocationName, Species, UserID) values ('Lumin Stream', 'Equus magicalus', 2);

insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Equus magicalus', 3);

insert into Sighting_Report (LocationName, Species, UserID) values ('High Rocks', 'Equus magicalus', 2);

insert into Sighting_Report (LocationName, Species, UserID) values ('Green Kiosk', 'Equus magicalus', 1);

insert into Sighting_Report (LocationName, Species, UserID) values ('Norquay Park', 'Equus magicalus', 4);

insert into Sighting_Report (LocationName, Species, UserID) values ('Central Garden', 'Equus magicalus', 4);
