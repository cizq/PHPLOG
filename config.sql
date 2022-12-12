DROP DATABASE if EXISTS autentificacion;

CREATE DATABASE autentificacion;
use autentificacion;

DROP TABLE if EXISTS Usuario;
CREATE TABLE `Usuario`(
    `id` int(6) NOT NULL AUTO_INCREMENT,
    `email` varchar(50),
    `password` varchar(100) NOT NULL,
    PRIMARY KEY(`id`)
);