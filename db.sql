create table services(
    id int(3) auto_increment primary key,
    nom_service varchar(50),
    lieu varchar(50)
);


create table employe(
    id int(3) auto_increment primary key,
    nom_employe varchar(50),
    prenom_employe varchar(50),
    fonction varchar(50),
    salaire varchar(50),
    photo varchar(100),
    service_id int(3) not null,
    constraint fk1 foreign key(service_id) references services(id)
);