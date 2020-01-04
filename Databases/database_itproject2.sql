

CREATE TABLE `account_office` (
  `officeID` int(20) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `depOfc` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`officeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO account_office VALUES
("3","sample","balansi","sao","office@slu.edu.ph","officefs");




CREATE TABLE `dean_office` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobNum` varchar(11) NOT NULL,
  `org` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `adviser` varchar(50) NOT NULL,
  `eveName` varchar(50) NOT NULL,
  `numPart` varchar(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `equipments` (
  `equipID` int(11) NOT NULL AUTO_INCREMENT,
  `equipName` varchar(100) NOT NULL,
  `equipStatus` varchar(100) NOT NULL,
  `equipRemarks` varchar(200) NOT NULL,
  PRIMARY KEY (`equipID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobNum` varchar(50) NOT NULL,
  `org` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `adviser` varchar(50) NOT NULL,
  `eveName` varchar(50) NOT NULL,
  `numPart` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


INSERT INTO events VALUES
("1","j","j","j","org","j","j","j","j","0000-00-00","0000-00-00","00:00:00","00:00:00"),
("2","j","j","j","org","j","j","j","j","2019-12-13","2019-12-12","00:00:00","00:00:00"),
("3","j","j","j","org","j","j","j","j","2019-12-12","2019-12-12","16:00:00","05:00:00");




CREATE TABLE `facilities` (
  `facilityID` int(15) NOT NULL AUTO_INCREMENT,
  `facilityLevel` varchar(15) NOT NULL,
  `facilityRoom` varchar(15) NOT NULL,
  `roomType` varchar(50) NOT NULL,
  `roomDescription` varchar(50) NOT NULL,
  `roomCapacity` varchar(15) NOT NULL,
  PRIMARY KEY (`facilityID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


INSERT INTO facilities VALUES
("10","100","100","Laboratory","dwadefdsf","500"),
("11","5","515","Lecture","ayus","500"),
("12","5","433","Laboratory","lecturelecturelecturelecturelecture","50");




CREATE TABLE `request_su` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobNum` varchar(11) NOT NULL,
  `org` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `adviser` varchar(50) NOT NULL,
  `eveName` varchar(50) NOT NULL,
  `numPart` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `equipments` varchar(500) NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


INSERT INTO request_su VALUES
("8","j","j","j","j","j","j","jj","j","1212-12-12","1212-12-12","00:12:00","00:12:00","100chairs, 2mics");




CREATE TABLE `sao_office` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `mobNum` varchar(11) NOT NULL,
  `org` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL,
  `adviser` varchar(50) NOT NULL,
  `eveName` varchar(50) NOT NULL,
  `numPart` varchar(5) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `semesterdate` (
  `id` int(255) NOT NULL,
  `semesterstart` varchar(255) NOT NULL,
  `semesterend` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;


INSERT INTO semesterdate VALUES
("1","2019-08-01","2019-12-01");




CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `orgs` varchar(100) NOT NULL,
  `pos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `endofsem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;


INSERT INTO users VALUES
("10","super","admin","super","admin","superadmin@localhost.ph","Super Admin","slu","Active",""),
("12","guest","user","guest","user","guestuser@localhost.ph","Guest User","slu","Active","2019-12-01"),
("13","admin","user","dean","dean","dean@localhost.ph","Dean User","slu","Active","2019-12-01"),
("14","admin","user","sao","sao","sao@localhost.ph","Sao User","slu","Active","2019-12-01"),
("15","sample","sample","super","admin","superadmin123@localhost.ph","Super Admin","slu","Active","2019-12-31");


