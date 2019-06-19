insert into User (Name,	Email ,Password) values ('Adam Smith', 'asmith@gmail.com', '123abc');

insert into User (Name,	Email ,Password) values ('Betty White', 'bwhite@gmail.com', '123abc');

insert into User (Name,	Email ,Password) values ('Cinda Zhou', 'czhou@hotmail.com', '123abc');

insert into User (Name,	Email ,Password) values ('Minnie Lee', 'mlee@hotmail.com', '123abc');


insert into Organism values ('Sciurus carolinensis', 'Eastern Grey Squirrel', 'hardwood forests');

insert into Organism values ('Pandion haliaetus', 'Osprey', 'near bodies of water');

Insert into Organism values('Salvelinus fontinalis', 'Brook trout', 'freshwater streams and lakes');

insert into Organism values ('Taraxacum officinale', 'Dandelion', 'temperate regions');

Insert into Organism values('Quercus alba', 'white oak', 'open forests');

insert into Organism values('Amanita phalloides', 'Death Cap', 'mycorhizal with hardwood trees');

Insert into Organism values('Psilocybe semilanceata', 'magic mushroom', 'grassland');

insert into Organism values('Armillaria mellea', 'honey fungus', 'parasitical on broadleaf trees');


Insert into Organism_Variation values ('Sciurus carolinensis', 'Grey', 'Common');

Insert into Organism_Variation values('Pandion haliaetus', 'dark brown', 'rare');

Insert into Organism_Variation values('Salvelinus fontinalis', 'dark green', 'common');

Insert into Organism_Variation values ('Taraxacum officinale', 'yellow', 'common');

Insert into Organism_Variation values ('Quercus alba', 'green', 'rare');

Insert into Organism_Variation values ('Amanita phalloides', 'white', 'common');

Insert into Organism_Variation values ('Psilocybe semilanceata', 'brown', 'rare');



insert into Animal values('Sciurus carolinensis', 'nuts', 'docile', 'healthy','squeak');

Insert into Animal values('Pandion haliaetus', 'fish', 'aggressive', 'healthy', 'chirp');

Insert into Animal values('Salvelinus fontinalis', 'fish', 'docile', 'healthy', NULL);


Insert into Animal_Eats values('Pandion haliaetus', 'Salvelinus fontinalis');


insert into Plant values('Taraxacum officinale', 'yellow', 45);

Insert into Plant values('Quercus alba', 'green', 'inedible'); 


Insert into Plant_Fruit values('Taraxacum officinale', 'dandelion fruit', 45);

Insert into Plant_Fruit values('Quercus alba', 'acorn', 143); 


insert into Fungus values('Amanita phalloides', 'inedible', 'smooth', 15, 'overpowering');

Insert into Fungus values('Psilocybe semilanceata', 'inedible', 'smooth', 2,  'musty');

Insert into Fungus values('Armillaria mellea', 'edible', 'smooth', 10, 'mushroomy');


Insert into produces_Toxin values('Psilocybe semilanceata', 'psilocybin', 'moderate', 'moderate', NULL);


Insert into Organism_Dependence values('Armillaria mellea', 'Quercus alba');

Insert into Location values('Sally Lake', '1753 Water Way', 'lake');

Insert into Location values('Lumin Stream', '1753 Water Way', 'stream');

Insert into Location values('Woody Forest', '2344 Terrestrial Ave', 'forest');

Insert into Location values('High Rocks', '2768 Terrestrial Ave', 'mountain');

Insert into Location values('Green Kiosk', '2457 Terrestrial Ave', 'meadow');

Insert into Location values('Norquay Park', '2324 Terrestrial Ave', 'park');

Insert into Location values('Central Garden', '2459 Terrestrial Ave', 'garden');


Insert into Location_Maintenance (LocationName, Schedule, Task) values('Central Garden', '2019-02-06', 'Cutting grass');

Insert into Location_Maintenance (LocationName, Schedule, Task) values('Norquay Park', '2019-12-23', 'Collecting garbage');


Insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Central Garden', 'rose garden', '2019-03-03', '2019-05-05');

Insert into Location_Remodel (LocationName, Infrastructure,ExpectedDate,RemodelDate) values ('Norquay Park', 'information kiosk', '2019-04-01', '2019-04-30');


Insert into Sighting_Report (LocationName, Species, UserID) values ('Lumin Stream', 'Salvelinus fontinalis', 1);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Sciurus carolinensis', 1);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Sally Lake', 'Pandion haliaetus',  2);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Central Garden', 'Taraxacum officinale', 2);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Quercus alba',  3);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Norquay Park', 'Amanita phalloides', 3);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Norquay Park', 'Psilocybe semilanceata', 3);

Insert into Sighting_Report (LocationName, Species, UserID) values ('Woody Forest', 'Armillaria mellea', 3);






