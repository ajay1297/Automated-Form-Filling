CREATE TABLE IF NOT EXISTS `members` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL ,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  KEY (`email`),
  KEY(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT = 1;

INSERT INTO `members`(`Id`,`username`,`email`,`password`) VALUES
(1,'ajay1297','ajay@gmail.com','aj@123456');


CREATE TABLE IF NOT EXISTS `formdetails` (
	`email` varchar(30) NOT NULL,
	`name` varchar(30) NOT NULL ,
	`fathersName` varchar(30) NOT NULL,
	`mothersName` varchar(30) NOT NULL,
	`dob` varchar(30) NOT NULL,
	`tenthboard` varchar(30) NOT NULL,
	`twelfthboard` varchar(30) NOT NULL,
	`tenthgpamax` varchar(30) NOT NULL,
	`tenthgpatotal` varchar(30) NOT NULL,
	`twelfthcbsemax` varchar(30) NOT NULL,
	`twelfthcbsetotal` varchar(30) NOT NULL,
	`tenthMax` varchar(30) NOT NULL,
	`tenthTotal` varchar(30) NOT NULL,
	`twelvethMax` varchar(30) NOT NULL,
	`twelvethTotal` varchar(30) NOT NULL,
	KEY(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `formdetails`(`email`,`name`,`fathersName`,`mothersName`,`dob`,`tenthboard`,`twelfthboard`,`tenthgpamax`,`tenthgpatotal`,`twelfthcbsemax`,`twelfthcbsetotal`,`tenthMax`,`tenthTotal`,`twelvethMax`,`twelvethTotal`) VALUES
('ajay@gmail.com','Ajay','AjaySFather','AjaySMother','12/03/1997','State','State','','','','','625','583','600','549');

#SET FOREIGN_KEY_CHECKS=OFF;
ALTER TABLE `formdetails` ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY(`email`) REFERENCES `members`(`email`) ON DELETE CASCADE;
#SET FOREIGN_KEY_CHECKS=ON;