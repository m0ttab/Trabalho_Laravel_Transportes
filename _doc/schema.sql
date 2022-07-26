use laravel;
 
drop table if exists cursos;
 
create table cursos (
    id int not null auto_increment,
    nome varchar(80) not null,
    nome_reduzido varchar(100) not null,
    primary key (id)
);

drop table if exists periodos;
 
create table periodos (
    id int not null auto_increment,
    ano varchar(80) not null,
    dt_inicio varchar(100) not null,
    dt_fim varchar(100) not null,

    primary key (id)
);

drop table if exists turmas;
 
create table turmas (
    id int not null auto_increment,
    nome varchar(80) not null,
    curso_id varchar(100) not null,
    primary key (id)
);
