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

insert into Animal values ('Equus magicalus', 'plants', 'docile', 'healthy', 'neigh');

insert into Animal values ('Danaus plexippus', 'nectar', 'docile', 'healthy', NULL);


insert into Animal_Eats values ('Pandion haliaetus', 'Salvelinus fontinalis');

insert into Animal_Eats values ('Larus glaucescens', 'Salvelinus fontinalis');

insert into Animal_Eats values ('Procyon lotor', 'Salvelinus fontinalis');

insert into Animal_Eats values ('Passer domesticus', 'Taraxacum officinale');

insert into Animal_Eats values ('Procyon lotor', 'Taraxacum officinale');


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
