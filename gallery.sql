drop database if exists gallery;
create database gallery default character set utf8;
use gallery;

CREATE TABLE users (
id			int not null primary key auto_increment,
username   		varchar(255) not null,
email		varchar(50) not null,
password    char(60) not null,
adress		varchar(100),
sessionId   varchar(50)
);

create table photos(
id		int not null primary key auto_increment,
user	int not null,
photo	varchar(255)
);

alter table photos add foreign key (user) references users(id);

#dodan username u users, radim na registraciji korisnika