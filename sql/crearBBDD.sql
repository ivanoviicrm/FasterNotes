CREATE DATABASE gonotes;

USE gonotes;

CREATE TABLE users (
    id          int not null auto_increment,
    nombre      varchar(50) not null,
    apellido    varchar(100),
    email       varchar(250) not null,
    password    varchar(50) not null,
    CONSTRAINT pk_users PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE (email)
);

CREATE TABLE notas (
    id          int not null auto_increment,
    user_id     int not null,
    titulo      varchar(250) not null,
    contenido   text not null,
    color       varchar(50) not null,
    fecha       datetime not null,
    CONSTRAINT pk_notas PRIMARY KEY (id),
    CONSTRAINT fk_notas_users FOREIGN KEY (user_id) REFERENCES users(id)
);