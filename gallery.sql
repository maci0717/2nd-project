drop database if exists gallery;
create database gallery default character set utf8;
use gallery;

CREATE TABLE users (
id			int not null primary key auto_increment,
username   	varchar(255) not null,
email		varchar(50) not null,
password    char(60) not null,
adress		varchar(100),
sessionId   varchar(50)
);

create table images(
id		int not null primary key auto_increment,
user	int not null,
status	varchar(255)
);

alter table images add foreign key (user) references users(id);

select * from users;
select * from images;
 
insert into images (user) values (1);

#Zadatak
#brisanje slika iz filea (mora biti bolji nacin)
#trebam popraviti AJAX da mogu i nelogirani korisnici vidjeti (autorizacija zeza)

#login sa username ili email
#pri loginu il necemu se pojavi prazan post


