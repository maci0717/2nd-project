drop database if exists gallery;
create database gallery default character set utf8;
use gallery;

CREATE TABLE users (
id		int not null primary key auto_increment,
nick    varchar(255),
name    varchar(100)

);