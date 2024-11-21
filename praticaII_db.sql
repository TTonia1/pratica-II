create database pratica2;
use pratica2;

create table cliente(
id_cliente int not null primary key auto_increment,
nome varchar(45),
CPF varchar(13),
email varchar(50),
telefone char(11)
);

create table funcionario(
id_funcionario int not null primary key auto_increment,
nome varchar(45),
email varchar(50)
);

create table solicitacao(
id_solicitacao int not null primary key auto_increment,
descricao varchar(200),
urgencia varchar(5),
status_solicitacao varchar(20),
data_abertura date,
id_cliente int not null,
foreign key(id_cliente) references cliente(id_cliente),
id_funcionario int,
foreign key (id_funcionario) references funcionario(id_funcionario)
);
