create database if not exists messageboard;

use messageboard;


 create table if not exists t_message(
	 id int(7) primary key auto_increment,
	 user varchar(20) not null,
	 time datetime,
	 title varchar(30),
	 context varchar(255)
 );
