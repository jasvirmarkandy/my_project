
CREATE DATABASE IF NOT EXISTS `my_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `my_project`;

CREATE TABLE IF NOT EXISTS `tbl_report` (
 `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `uuid` varchar(255) NOT NULL,
 `bank_name` varchar(255) NOT NULL,
 `bank_bic` varchar(255) NOT NULL,
 `report_score` float(15) NOT NULL,
 `type` varchar(255) NOT NULL,
 `createdAt` varchar(255) NOT NULL, 
 `publishedAt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

