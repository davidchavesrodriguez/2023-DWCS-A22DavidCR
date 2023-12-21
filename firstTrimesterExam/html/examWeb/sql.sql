--source ficheiro.sql
create database blog;
use blog;
create table usuario(
  id int auto_increment primary key,
  name varchar(200) not null,
  email varchar(250) not null,
  password varchar(200) not null
);
create table topic(
  id int auto_increment primary key,
  description varchar(250) not null
);
create table post(
  id int auto_increment primary key,
  contents varchar(250) not null,
  idTopic int not null,
  idUser int not null,
  foreign key (idTopic) references topic(id),
  foreign key (idUser) references usuario(id)
);
create user userWeb@localhost identified by 'abc123.';
grant all privileges on blog.* to userWeb@localhost;
insert into usuario (id,name,email,password) values (1,'Carmen','carmen@exame.net','abc123.');
insert into usuario (id,name,email,password) values (2,'Lara','lara@exame.net','abc123.');
insert into usuario (id,name,email,password) values (3,'Paco','paco@exame.net','abc123.');
insert into topic values (1,'Java');
insert into topic values (2,'PHP');
insert into topic values (3,'HTML5');
insert into post values (1,'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.',1,2);
insert into post values (2,'Java is generally faster than PHP because of its Just-In-Time (JIT) compilation feature, which allows it to compile code at runtime, resulting in faster execution times. On the other hand, PHP is an interpreted language, meaning it is run directly without being compiled.',1,1);
insert into post values (3,'PHP is a general-purpose scripting language geared towards web development.',2,3);
insert into post values (4,'PHP is still extremely popular and is used in over 75% of all websites where the server-side programming language is known.',2,1);
insert into post values (5,'HTML5 (Hypertext Markup Language 5) is a markup language used for structuring and presenting content on the World Wide Web.',3,3);