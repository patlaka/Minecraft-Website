-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2010 at 07:32 PM
-- Server version: 5.0.91
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minecraft-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `frontpage`
--

CREATE TABLE IF NOT EXISTS `frontpage` (
  `id` int(3) NOT NULL auto_increment,
  `datecreated` date default NULL,
  `created` timestamp NULL default CURRENT_TIMESTAMP,
  `title` varchar(200) default NULL,
  `content` text,
  `onfront` int(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Table structure for table `webusers`
--

CREATE TABLE IF NOT EXISTS `webusers` (
  `id` int(3) NOT NULL auto_increment,
  `login` varchar(20) default NULL,
  `password` varchar(50) default NULL,
  `referrer` varchar(20) default NULL,
  `email` varchar(30) default NULL,
  `canrefer` int(1) NOT NULL default '1',
  `level` int(1) NOT NULL default '1',
  `timesloggedin` int(1) NOT NULL default '0',
  `lastlogin` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;
