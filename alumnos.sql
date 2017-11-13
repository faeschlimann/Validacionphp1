-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 28, 2017 at 12:18 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `alumnos`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `datos`
-- 

CREATE TABLE `datos` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `annyo` varchar(5) NOT NULL,
  `semestre` varchar(1) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `datos`
-- 

INSERT INTO `datos` VALUES ('11', 'fedor', '2010', '2', 'fdsfsfdfd');
INSERT INTO `datos` VALUES ('11', 'fedor', '2010', '2', 'fdsfsfdfd');
INSERT INTO `datos` VALUES ('11', 'fedor', '2010', '2', 'fdsfsfdfd');
