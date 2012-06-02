-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema greenjobs
--

CREATE DATABASE IF NOT EXISTS greenjobs;
USE greenjobs;

--
-- Definition of table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id_applications` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_jobs` int(10) unsigned NOT NULL,
  `id_users` int(10) unsigned NOT NULL,
  `identifyCV` varchar(45) NOT NULL,
  PRIMARY KEY (`id_applications`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;


--
-- Definition of table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id_companies` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `companyName` varchar(70) NOT NULL,
  `id_users` int(10) unsigned NOT NULL,
  `logCompany` varchar(45) NOT NULL,
  `latCompany` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id_categories` int(10) unsigned NOT NULL,
  `identifyLogo` varchar(45) NOT NULL,
  `hiddenInfo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_companies`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;


--
-- Definition of table `countapplications`
--

DROP TABLE IF EXISTS `countapplications`;
CREATE TABLE `countapplications` (
  `id_countApplications` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_application` int(10) unsigned NOT NULL,
  `counts` varchar(45) NOT NULL,
  PRIMARY KEY (`id_countApplications`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countapplications`
--

/*!40000 ALTER TABLE `countapplications` DISABLE KEYS */;
/*!40000 ALTER TABLE `countapplications` ENABLE KEYS */;


--
-- Definition of table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id_events` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `dateEvent` varchar(45) NOT NULL,
  `identify` varchar(45) NOT NULL,
  PRIMARY KEY (`id_events`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;


--
-- Definition of table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id_jobs` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activityInfo` varchar(100) NOT NULL,
  `id_companies` int(10) unsigned NOT NULL,
  `workstation` varchar(100) NOT NULL,
  `principalArea` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `essentialRequirements` text NOT NULL,
  `agePreferable` varchar(10) NOT NULL,
  `contractIdentify` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  `hours` varchar(45) NOT NULL,
  `wage` varchar(45) NOT NULL,
  `benefits` text NOT NULL,
  PRIMARY KEY (`id_jobs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;


--
-- Definition of table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id_products` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `id_companies` int(10) unsigned NOT NULL,
  `stock` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  PRIMARY KEY (`id_products`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


--
-- Definition of table `proposals`
--

DROP TABLE IF EXISTS `proposals`;
CREATE TABLE `proposals` (
  `id_proposals` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `dateBegin` varchar(45) NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`id_proposals`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposals`
--

/*!40000 ALTER TABLE `proposals` DISABLE KEYS */;
/*!40000 ALTER TABLE `proposals` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_users` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `representativeName` varchar(45) NOT NULL,
  `representativeCharge` varchar(45) NOT NULL,
  `representativePhone` varchar(45) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
