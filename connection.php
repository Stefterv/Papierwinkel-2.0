<?php 
	global $connection;
	$connection = new mysqli("localhost", "root", "root", "Papierwinkel");
	if ($connection->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
	    $connection = new msqli("localhost","root","root");
	    $connection->query('-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2013 at 07:03 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Papierwinkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `Data`
--

CREATE TABLE `Data` (
  `day` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `open` int(2) NOT NULL,
  `close` int(2) NOT NULL,
  PRIMARY KEY (`day`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Data`
--

INSERT INTO `Data` (`day`, `open`, `close`) VALUES
(1, 9, 12),
(2, 9, 12),
(3, 12, 15),
(4, 9, 12),
(5, 9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Settings`
--

CREATE TABLE `Settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT \'\',
  `value` varchar(40) NOT NULL DEFAULT \'\',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Settings`
--

INSERT INTO `Settings` (`id`, `name`, `value`) VALUES
(1, \'away\', \'28 oct\');
');
	}
?>