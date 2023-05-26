CREATE DATABASE ProjetoAquaView;
use ProjetoAquaView;

CREATE TABLE usuario(
    `idUsuario`         int          not null auto_increment,
    `nomeImg`           varchar(150) not null,
    `nome`              varchar(150) not null,
    `usuario`           varchar(50)  not null,
    `email`             varchar(100) null default null,
    `sexo`              varchar(100) not null,
    `dtNasc`            date         not null,
    `senha`             varchar(100) not null,
    `telefone`          varchar(20)  null default null,
    `numDispositivo`    varchar(20)  null default null,
    primary key(`idUsuario`)
);

CREATE TABLE peixe(
    `idPeixe`           int             not null auto_increment,
    `nomeImg`           varchar(200)    not null,
    `especie`           varchar(150)    not null,
    `cor`               varchar(50)     not null,
    `descri`            text            not null,
    `tempMin`           decimal(9,2)    not null,
    `tempMax`           decimal(9,2)    not null,
    `phMin`             decimal(9,2)    not null,
    `phMax`             decimal(9,2)    not null,
    `alimento`          varchar(30)     null default null,
    `tipo`              varchar(100)    null default null,
    `salinidade`        varchar(100)    null default null,
    `dificuldade`       varchar(50)     null default null,
    primary key(`idPeixe`)
);

CREATE TABLE peixeUsuario(
    `idPeixeUser`       int          not null auto_increment,
    `nomeImg`           varchar(150) not null,
    `especie`           varchar(150) not null,
    `nome`              varchar(50)  not null,
    `cor`               varchar(50)  not null,
    `temp`              varchar(50)  not null,
    `ph`                varchar(50)  not null,
    `alimento`          varchar(30)  null default null,
    `tipo`              varchar(50)  not null,
    `salinidade`        varchar(100) null default null,
    `idUsuario`         int          not null,
    primary key(`idPeixeUser`),
    constraint `fk_idUsuario` foreign key (`idUsuario`) references `usuario`(`idUsuario`)
);

CREATE TABLE dadosAquario(
    `idDados`           int          not null auto_increment,
    `vlrPH`             decimal(9,2) not null,
    `vlrTemp`           decimal(9,2) not null,
    `vlrSal`            decimal(9,2) not null,
    `dtAtual`           datetime     not null,
    `idUsuario`         int          not null,
    primary key(`idDados`),
    constraint `fk_AquaUser` foreign key (`idUsuario`) references `usuario`(`idUsuario`)
);