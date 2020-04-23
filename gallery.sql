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
 

#popraviti render nakon brisanja acc + automatski log out
#prebaciti autorizaciju u njen kontroler
#skužiti kako nakon brisanja acc-a ukloniti slike iz direktorija, mozda unlink..
#login sa username ili email

#Zadatak
#Ajax na pocetnoj
#brisanje slika iz filea
