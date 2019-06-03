/*
Navicat MySQL Data Transfer

Source Server         : desenvolvimento
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : avaliacao_prodigious

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2019-06-03 15:06:03
*/

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img_foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
