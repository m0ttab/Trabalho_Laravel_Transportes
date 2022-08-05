create database transportes;

use transportes;

drop table if exists respostas;
drop table if exists periodos;
drop table if exists turmas;
drop table if exists cursos;
 
create table cursos (
    id int not null auto_increment,
    nome varchar(200) not null,
    nome_reduzido varchar(100) not null,

    primary key(id)
);
 
create table periodos (
    id int not null auto_increment,
    ano varchar(50) not null,
    dt_inicio date not null,
    dt_fim date not null,

    primary key(id)
);
 
create table turmas (
    id int not null auto_increment,
    nome varchar(80) not null,
    curso_id int not null,

    primary key(id),
    foreign key(curso_id) references cursos(id)
);

create table respostas (
    
    id int not null auto_increment,
    periodo_id int not null,
    turma_id int not null,
    uf_id int not null,
    nome_aluno varchar(80) not null,
    cpf int not null,
    cidade varchar(200) not null,
    cidade_id int not null,
    uf varchar(200) not null,
    transporte varchar(200) not null,
    poder_publico_responsavel varchar(200) not null,
    diferenca_paga int,

    primary key(id),
    foreign key(periodo_id) references periodos(id),
    foreign key(turma_id) references turmas(id)
    
);
