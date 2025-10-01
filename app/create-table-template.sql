-- Active: 1717760825856@@127.0.0.1@3306@1576537_mydb
CREATE TABLE `dynuser` (
    `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'user id',
    `username` varchar(50) DEFAULT NULL,
    `password` varchar(25) DEFAULT NULL,
    `email` varchar(120) DEFAULT NULL,
    `phone` varchar(20) DEFAULT NULL,
    `image` varchar(50) DEFAULT 'blank',
    `isadmin` bit(1) DEFAULT NULL,
    `ispremium` bit(1) DEFAULT b'0',
    `created` datetime DEFAULT NULL COMMENT 'Create Time'
)

CREATE TABLE dynasty(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name VARCHAR(75),
    userid INT,
    type VARCHAR(5)
) COMMENT '';


CREATE TABLE seasons(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    dynastyid INT,
    year int,
    teamid int
) COMMENT '';

CREATE TABLE dynsch(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    seasonid int NOT NULL,
    week int NOT NULL,
    awayid int NOT NULL,
    homeid int NOT NULL,
    ascore int NOT NULL,
    hscore int NOT NULL,
    location VARCHAR(50),
    gamedate DATETIME
) COMMENT '';

CREATE TABLE dyngamestats(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    schid int NOT NULL,
    teamid int NOT NULL,
    category VARCHAR(25) NOT NULL,
    name varchar(25) NOT NULL,
    value int NOT NULL
) COMMENT '';

CREATE TABLE `dynpstatsrushing` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `schid` int(11) NOT NULL,
    `playerid` int(11) NOT NULL,
    `rush` int(11) DEFAULT 0,
    `yards` int(11) DEFAULT 0,
    `tds` int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
);

CREATE TABLE `dynpstatspassing` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `schid` int(11) NOT NULL,
    `playerid` int(11) NOT NULL,
    `attempts` int(11) DEFAULT 0,
    `completions` int(11) DEFAULT 0,
    `yards` int(11) DEFAULT 0,
    `tds` int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
);

CREATE TABLE `dynpstatsreceiving` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `schid` int(11) NOT NULL,
    `playerid` int(11) NOT NULL,
    `receptions` int(11) DEFAULT 0,
    `yards` int(11) DEFAULT 0,
    `tds` int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
);

CREATE TABLE `dynpstatsdefense` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `schid` int(11) NOT NULL,
    `playerid` int(11) NOT NULL,
    `tackles` int(11) DEFAULT 0,
    `tfl` int(11) DEFAULT 0,
    `sacks` int(11) DEFAULT 0,
    `forcedfumbles` int(11) DEFAULT 0,
    `fumblerecoveries` int(11) DEFAULT 0,
    `tds` int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
);

CREATE TABLE `dynpstatsturnovers` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `schid` int(11) NOT NULL,
    `playerid` int(11) NOT NULL,
    `interceptions` int(11) DEFAULT 0,
    `fumbles` int(11) DEFAULT 0,
    `fumbleslost` int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
);

CREATE TABLE `dynroster` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    `teamid` int(11) NOT NULL,
    `fname` varchar(25) NOT NULL,
    `lname` varchar(25) NOT NULL,
    `number` int(11) DEFAULT NULL,
    `position` varchar(10) DEFAULT NULL,
    `year` varchar(5) DEFAULT NULL,
    `isredshirt` bit(1) DEFAULT NULL,
    `seasonid` int(11) DEFAULT NULL,
    `ht` varchar(5) DEFAULT '0',
    `wt` int(11) DEFAULT 0,
    `hometown` varchar(50) DEFAULT NULL,
    `ovr` int(11) DEFAULT 0,
    `spd` int(11) DEFAULT 0,
    `str` int(11) DEFAULT 0,
    `agi` int(11) DEFAULT 0,
    `acc` int(11) DEFAULT 0,
    `awk` int(11) DEFAULT 0,
    `btk` int(11) DEFAULT 0,
    `cod` int(11) DEFAULT 0,
    `bcv` int(11) DEFAULT 0,
    `sra` int(11) DEFAULT 0,
    `sfd` int(11) DEFAULT 0
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 1379 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci

CREATE TABLE dynarticles(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    dynastyid int NOT NULL,
    created DATETIME NOT NULL,
    title varchar(50) NOT NULL,
    content TEXT NOT NULL,
    week int(11) DEFAULT 0,
) COMMENT '';

CREATE TABLE dyncrteams(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    dynastyid INT NOT NULL,
    name VARCHAR(75),
    mascot VARCHAR(75),
    location VARCHAR(100),
    color VARCHAR(8),
    confid INT,
    logo VARCHAR(25),
    rank INT
) COMMENT '';

CREATE TABLE dynteams(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name VARCHAR(75),
    mascot VARCHAR(75),
    location VARCHAR(100),
    color VARCHAR(8),
    confid INT,
    logo INT,
    rank INT
) COMMENT '';


INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (2,'Air Force', 'Falcons','21423','Colorado Springs, CO',25,'0033a0',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (3,'Akron', 'Zips','21264','Akron, OH',22,'041e42',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (4,'Alabama', 'Crimson Tide','21352','Tuscaloosa, AL',30,'a60c31',5);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (10,'Appalachian State', 'Mountaineers','21364','Boone, NC',35,'222222',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (11,'Arizona', 'Wildcats','21335','Phoenix, AZ',28,'002147',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (12,'Arizona State', 'Sun Devils','21336','Tempe, AZ',28,'3e0c3a',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (13,'Arkansas', 'Razorbacks','21353','Fayetteville, AK',30,'9d2235',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (14,'Arkansas State', 'Red Wolves','21398','Jonesboro, AK',35,'cc092f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (16,'Army', 'Black Knights','21345','West Point, NY',15,'d4bf91',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (17,'Auburn', 'Tigers','21354','Auburn, AL',30,'03244d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (19,'Ball State', 'Cardinals','21265','Muncie, IN',22,'ba0c2f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (20,'Baylor', 'Bears','21201','Waco, TX',6,'1c3c34',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (25,'Boise State', 'Broncos','21213','Boise, ID',25,'0033a0',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (27,'Boston College', 'Eagles','21160','Boston, MA',1,'98002E',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (28,'Bowling Green', 'Falcons','21266','Bowling Green, OH',22,'4f2c1d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (33,'Buffalo', 'Bulls','21267','Buffalo, NY',22,'005bbb',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (35,'BYU', 'Cougars','21424','Provo, UT',6,'002255',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (40,'California', 'Golden Bears','21337','Berkley, CA',28,'041e42',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (46,'Central Florida', 'Golden Knights','21406','Orlando, FL',6,'b7a369',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (47,'Central Michigan', 'Chippewas','21268','Mount Pleasant, MI',22,'6a0032',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (50,'Charlotte', '49ers','21241','Charlotte, NC',4,'046A38',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (53,'Cincinnati', 'Bearcats','21235','Cincinnati, OH',6,'e00122',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (54,'Clemson', 'Tigers','21129','Clemson, SC',1,'F66733',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (56,'Coastal Carolina', 'Chanticleers','21183','Conway, SC',35,'006f71',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (58,'Colorado', 'Buffaloes','21202','Boulder, CO',28,'000000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (59,'Colorado State', 'Rams','21425','Fort Collins, CO',25,'1e4d2b',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (61,'Connecticut', 'Huskies','21161','Storrs, CT',15,'000e2f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (75,'Duke', 'Blue Devils','21130','Durham, NC',1,'001A57',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (77,'East Carolina', 'Pirates','21226','Greenville, NC',4,'592A8A',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (81,'Eastern Michigan', 'Eagles','21269','Ypsilanti, MI',22,'046a38',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (87,'Florida', 'Gators','21355','Gainesville, FL',30,'003087',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (89,'Florida Atlantic', 'Owls','21407','Boca Raton, FL',4,'003366',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (91,'Florida International', 'Golden Panthers','21399','Miami, FL',14,'081E3F',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (92,'Florida State', 'Seminoles','21131','Tallahassee, FL',1,'782F40',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (94,'Fresno State', 'Bulldogs','21426','Fresno, CA',25,'00235d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (100,'Georgia', 'Bulldogs','21356','Athens, GA',30,'ba0c2f',4);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (101,'Georgia Southern', 'Eagles','21371','Statesboro, GA',35,'011e41',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (102,'Georgia State', 'Panthers','21408','Atlanta, GA',35,'0039a6',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (103,'Georgia Tech', 'Yellow Jackets','21132','Atlanta, GA',1,'EEB211',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (110,'Hawaii', 'Rainbow Warriors','21427','Honolulu, HI',25,'00BB00',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (114,'Houston', 'Cougars','21237','Houston, TX',6,'c92a39',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (119,'Illinois', 'Fighting Illini','21190','Champaign, IL',11,'e84a27',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (123,'Indiana', 'Hoosiers','21191','Bloomington, IN',11,'990000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (126,'Iowa', 'Hawkeyes','21192','Iowa City, IA',11,'000000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (127,'Iowa State', 'Cyclones','21203','Aimes, IA',6,'822433',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (131,'Jacksonville State', 'Gamecocks','21409','Jacksonville, AL',14,'CC0000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (132,'James Madison', 'Dukes','21228','Harrisonburg, VA',35,'450084',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (133,'Kansas', 'Jayhawks','21204','Lawrence, KS',6,'0051ba',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (135,'Kansas State', 'Wildcats','21205','Manhattan, KS',6,'512888',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (137,'Kent State', 'Golden Flashes','21270','Kent, OH',22,'003875',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (138,'Kentucky', 'Wildcats','21357','Lexington, KY',30,'0033a0',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (144,'Liberty', 'Flames','21184','Lynchburg, VA',14,'002D62',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (151,'Louisiana', 'Ragin Cajuns','21402','Lafayette, LA',35,'d11c2e',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (152,'Louisiana Tech', 'Bulldogs','21400','Ruston, LA',14,'E31B23',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (153,'Louisiana-Monroe', 'Warhawks','21378','Monroe, LA',35,'',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (154,'Louisville', 'Cardinals','21238','Louisville, KY',1,'AD0000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (158,'LSU', 'Tigers','21358','Baton Rogue, LA',30,'461d7c',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (163,'Marshall', 'Thundering Herd','21272','Huntington, WV',35,'00b140',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (164,'Maryland', 'Terrapins','21133','College Park, MD',11,'cf102d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (170,'Memphis', 'Tigers','21240','Memphis, TN',4,'003087',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (173,'Miami', 'Hurricanes','21163','Miami, FL',1,'F47321',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (174,'Miami (OH)', 'Redhawks','21271','Miami, OH',22,'b61e2e',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (175,'Michigan', 'Wolverines','21193','Ann Arbor, MI',11,'00274c',1);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (176,'Michigan State', 'Spartans','21194','East Lansing, MI',11,'18453b',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (177,'Middle Tennessee St', 'Blue Raiders','21328','Murfreesboro, TN',14,'006DB6',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (179,'Minnesota', 'Golden Gophers','21195','Minneapolis, MN',11,'862334',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (180,'Mississippi State', 'Bulldogs','21360','Starkville, MI',30,'660000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (182,'Missouri', 'Tigers','21206','Columbia, MO',30,'c69214',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (191,'Navy', 'Midshipmen','21351','Annapolis, MD',4,'00205B',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (192,'Nebraska', 'Cornhuskers','21207','Lincoln, NE',11,'e41c38',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (193,'Nevada', 'Wolf Pack','21219','Reno, NV',25,'011e41',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (196,'New Mexico', 'Lobos','21429','Albuquerque, NM',25,'ba0c2f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (197,'New Mexico State', 'Aggies','21220','Las Cruces, NM',14,'861F41',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (203,'North Carolina', 'Tarheels','21134','Chapel Hill, NC',1,'4B9CD3',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (206,'North Carolina State', 'Wolfpack','21135','Raleigh, NC',1,'CC0000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (210,'North Texas', 'Mean Green','21221','Denton, TX',4,'00853E',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (214,'Northern Illinois', 'Huskies','21273','Dekalb, IL',22,'ba0c2f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (217,'Northwestern', 'Wildcats','21196','Chicago, IL',11,'492f92',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (219,'Notre Dame', 'Fighting Irish','21164','South Bend, IN',15,'001441',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (221,'Ohio', 'Bobcats','21274','Athens, OH',22,'00694e',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (223,'Ohio State', 'Buckeyes','21197','Columbus, OH',11,'C20F2F',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (224,'Oklahoma', 'Sooners','21208','Norman, OK',6,'841617',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (225,'Oklahoma State', 'Cowboys','21209','Oklahoma City, OK',6,'ff6600',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (226,'Old Dominion', 'Monarchs','21230','Richmond, VA',35,'00325b',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (227,'Ole Miss', 'Rebels','21359','Oxford, MI',30,'14213d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (230,'Oregon', 'Ducks','21338','Eugene, OR',28,'008000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (231,'Oregon State', 'Beavers','21339','Corvallis, OR',28,'dc4405',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (233,'Penn State', 'Nittany Lions','21198','University Park, PA',11,'002D62',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (236,'Pittsburgh', 'Panthers','21165','Pittsburgh, PA',1,'003594',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (243,'Purdue', 'Boilermakers','21199','West Lafayette, IN',11,'9d968d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (249,'Rice', 'Owls','21430','Houston, TX',4,'00205B',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (253,'Rutgers', 'Scarlet Knights','21167','Pascataway, NJ',11,'cf102d',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (260,'Sam Houston State', 'Bearkats','21381','Houston, TX',14,'FE5100',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (263,'San Diego State', 'Aztecs','21431','San Diego, CA',25,'c41230',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (265,'San Jose State', 'Spartans','21432','San Jose, CA',25,'4d90cd',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (271,'SMU', 'Mustangs','21433','Dallas, TX',4,'0033A0',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (272,'South Alabama', 'Jaguars','21401','Mobile, AL',35,'bf0d3e',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (273,'South Carolina', 'Gamecocks','21361','Columbia, SC',30,'73000a',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (278,'South Florida', 'Bulls','21243','Tampa, FL',4,'006747',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (284,'Southern Mississippi', 'Golden Eagles','21242','Hattisburg, MI',35,'000000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (290,'Stanford', 'Cardinal','21340','Palo Alto, CA',28,'8c1515',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (295,'Syracuse', 'Orange','21170','Syracuse, NY',1,'D44500',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (297,'TCU', 'Horned Frogs','21434','Fort Worth, TX',6,'4d1979',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (298,'Temple', 'Owls','21147','Philadelphia, PA',4,'9D2235',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (299,'Tennessee', 'Volunteers','21362','Knoxville, TN',30,'ff8200',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (303,'Texas', 'Longhorns','21210','Austin, TX',6,'bf5700',3);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (304,'Texas A&M', 'Aggies','21211','College Station, TX',30,'500000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (308,'Texas State', 'Bobcats','21384','San Marcos, TX',35,'501214',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (309,'Texas Tech', 'Red Raiders','21212','Lubbock, TX',6,'cc0000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (310,'Texas-El Paso', 'Miners','21435','El Paso, TX',14,'FF8200',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (311,'Texas-San Antonio', 'Roadrunners','21385','San Antonio, TX',4,'F15A22',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (313,'Toledo', 'Rockets','21275','Toledo, OH',22,'15397f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (315,'Troy', 'Trojans','21414','Troy, AL',35,'6d0017',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (316,'Tulane', 'Green Wave','21245','Tulane, LA',4,'006747',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (317,'Tulsa', 'Golden Hurricane','21436','Tulsa, OK',4,'002D72',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (318,'UAB', 'Blazers','21234','Birmingham, AL',4,'006341',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (324,'UCLA', 'Bruins','21341','Pasadena, CA',28,'2d68c4',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (328,'UNLV', 'Runnin Rebels','21428','Las Vegas, NV',25,'cf0a2c',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (329,'USC', 'Trojans','21342','Los Angeles, CA',28,'9d2235',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (332,'Utah', 'Utes','21437','Salt Lake City, UT',28,'cc0000',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (333,'Utah State', 'Aggies','21224','Provo, UT',25,'002a42',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (337,'Vanderbilt', 'Commodores','21363','Nashville, TN',30,'a8996e',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (340,'Virginia', 'Cavaliers','21136','Charlottesville, VA',1,'232D4B',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (342,'Virginia Tech', 'Hokies','21148','Lynchburg, VA',1,'08A1E4',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (345,'Wake Forest', 'Demon Deacons','21137','Winston-Salem, NC',1,'A67F31',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (346,'Washington', 'Huskies','21343','Seattle, WA',28,'4b0082',2);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (347,'Washington State', 'Cougars','21344','Pulman, WA',28,'981e32',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (349,'West Virginia', 'Mountaineers','21172','Charleston, WV',6,'002855',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (352,'Western Kentucky', 'Hilltoppers','21403','Bowling Green, KY',14,'C60C30',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (353,'Western Michigan', 'Broncos','21276','Kalamazoo, MI',22,'231f20',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (357,'Wisconsin', 'Badgers','21200','Madison, WI',11,'c4012f',0);
INSERT INTO dynteams (id,name, mascot, logo, location, confid, color, rank) VALUES (360,'Wyoming', 'Cowboys','21438','Laramie, WY',25,'492f24',0);



CREATE TABLE dynconf(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    name VARCHAR(75),
    abbr VARCHAR(8)
) COMMENT '';


INSERT INTO dynconf (id, name, abbr) VALUES (1,'Atlantic Coast Conference', 'ACC');
INSERT INTO dynconf (id, name, abbr) VALUES (2,'Atlantic Sun Conference', 'ASun');
INSERT INTO dynconf (id, name, abbr) VALUES (3,'America East Conference', 'AEC');
INSERT INTO dynconf (id, name, abbr) VALUES (4,'American Athletic Conference', 'AAC');
INSERT INTO dynconf (id, name, abbr) VALUES (5,'Atlantic 10 Conference', 'A10');
INSERT INTO dynconf (id, name, abbr) VALUES (6,'Big 12 Conference', 'BIG12');
INSERT INTO dynconf (id, name, abbr) VALUES (7,'Big East Conference', 'BE');
INSERT INTO dynconf (id, name, abbr) VALUES (8,'Big Sky Conference', 'BSky');
INSERT INTO dynconf (id, name, abbr) VALUES (9,'Big South Conference', 'BSou');
INSERT INTO dynconf (id, name, abbr) VALUES (10,'Big South-OVC Association', 'BSOVC');
INSERT INTO dynconf (id, name, abbr) VALUES (11,'Big Ten Conference', 'B1G');
INSERT INTO dynconf (id, name, abbr) VALUES (12,'Big West Conference', 'BW');
INSERT INTO dynconf (id, name, abbr) VALUES (13,'Coast Athletic Association', 'CAA');
INSERT INTO dynconf (id, name, abbr) VALUES (14,'Conference USA', 'CUSA');
INSERT INTO dynconf (id, name, abbr) VALUES (15,'1 Independents', 'I-1');
INSERT INTO dynconf (id, name, abbr) VALUES (16,'2 Independents', 'I-2');
INSERT INTO dynconf (id, name, abbr) VALUES (17,'Horizon League', 'HL');
INSERT INTO dynconf (id, name, abbr) VALUES (18,'Independents', 'IND');
INSERT INTO dynconf (id, name, abbr) VALUES (19,'Ivy League', 'Ivy');
INSERT INTO dynconf (id, name, abbr) VALUES (20,'Mid-American Athletic Conference', 'MAAC');
INSERT INTO dynconf (id, name, abbr) VALUES (21,'Mid-Eastern Athletic Conference', 'MEAC');
INSERT INTO dynconf (id, name, abbr) VALUES (22,'Mid-American Conference', 'MAC');
INSERT INTO dynconf (id, name, abbr) VALUES (23,'Missouri Valley Conference', 'MVC');
INSERT INTO dynconf (id, name, abbr) VALUES (24,'Missouri Valley Football Conference', 'MVFC');
INSERT INTO dynconf (id, name, abbr) VALUES (25,'Mountain West Conference', 'MWC');
INSERT INTO dynconf (id, name, abbr) VALUES (26,'Northeast Conference', 'NEC');
INSERT INTO dynconf (id, name, abbr) VALUES (27,'Ohio Valley Conference', 'OVC');
INSERT INTO dynconf (id, name, abbr) VALUES (28,'PAC-12 Conference', 'PAC12');
INSERT INTO dynconf (id, name, abbr) VALUES (29,'Patriot League', 'Pat');
INSERT INTO dynconf (id, name, abbr) VALUES (30,'Southeastern Conference', 'SEC');
INSERT INTO dynconf (id, name, abbr) VALUES (31,'Southwestern Athletic Conference', 'SWAC');
INSERT INTO dynconf (id, name, abbr) VALUES (32,'Southern Conference', 'Sou');
INSERT INTO dynconf (id, name, abbr) VALUES (33,'Southland Conference', 'SLC');
INSERT INTO dynconf (id, name, abbr) VALUES (34,'Summit League', 'Sum');
INSERT INTO dynconf (id, name, abbr) VALUES (35,'Sun Belt Conference', 'SBC');
INSERT INTO dynconf (id, name, abbr) VALUES (36,'Western Athletic Conference', 'WAC');
INSERT INTO dynconf (id, name, abbr) VALUES (37,'Pioneer Football League', 'PFL');
INSERT INTO dynconf (id, name, abbr) VALUES (38,'United Athletic Conference', 'UAC');
INSERT INTO dynconf (id, name, abbr) VALUES (39,'West Coast Conference', 'WCC');
