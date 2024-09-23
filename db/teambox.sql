CREATE DATABASE teambox;

USE teambox;

drop database teambox;

CREATE TABLE user(
    id int primary key auto_increment,
    nickname varchar(50) not null,
    email varchar(50) not null,
    status bool not null default TRUE
);

CREATE TABLE room(
    id int primary key auto_increment,
    type ENUM('private', 'group', 'diffusion') not null,
    creation_date datetime default now()
);

CREATE TABLE message(
    id int primary key auto_increment,
    id_room int not null,
    id_user int not null,
    type ENUM('text', 'image', 'audio', 'documents') not null,
    content varchar(5000) CHARACTER SET UTF8MB4 not null,
    send_date datetime default now(),
    url varchar(300),
    foreign key (id_room) references room(id),
    foreign key (id_user) references user(id)
);


CREATE TABLE users_room(
    id int primary key auto_increment,
    id_room int not null,
    id_user int not null,
    foreign key (id_room) references room(id),
    foreign key (id_user) references user(id)
);


-- TRIGGERS



