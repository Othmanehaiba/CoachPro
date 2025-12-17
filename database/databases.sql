create database coachPro;

use coachPro;
create table user(
	id_user int,
    nom varchar(50),
    prenom varchar(50),
    email varchar(100),
    password varchar(100),
    photo varchar(255),
    role varchar(50)
);

use coachPro;
ALTER TABLE users
MODIFY id_user INT NOT NULL AUTO_INCREMENT;

use coachPro;
create table coach(
	id_coach int not null auto_increment,
    biographie varchar(255),
    annees_experience int,
    tarif float,
    primary key(id_coach)
);

use coachPro;
create table certification(
	id_certification int not null auto_increment,
    id_coach int,
    titre varchar(100),
    date_obtension date,
    primary key(id_certification),
    foreign key(id_coach) references coach(id_coach)
);

use coachPro;
create table coachCertif(
	id_certification int not null,
    id_coach int not null,
    primary key(id_certification,id_coach),
    foreign key(id_certification) references certification(id_certification),
    foreign key(id_coach) references coach(id_coach)
);

use coachPro;
create table disciplineSportif(
	id_discipline int not null auto_increment,
    nom_discipline varchar(100),
    description varchar(255),
    primary key(id_discipline)
);

use coachPro;
create table Coachdiscipline(
	id_coach int not null,
    id_discipline int not null,
    primary key(id_coach,id_discipline),
    foreign key(id_coach) references coach(id_coach),
    foreign key(id_discipline) references disciplineSportif(id_discipline)
);

use coachPro;
create table disponibilite(
	id_disponibilite int not null auto_increment,
    id_coach int not null,
    date_dispo date,
    etat varchar(100),
    heure_debut time,
    heure_fin time,
    primary key(id_disponibilite),
    foreign key(id_coach) references coach(id_coach)
);

use coachPro;
create table reservation(
	id_reservation int not null auto_increment,
    id_user int not null,
    id_coach int not null,
    id_disponibilite int not null,
    date_reservation date,
    statut varchar(100),
    primary key(id_reservation),
    foreign key(id_user) references user(id_user),
    foreign key(id_coach) references coach(id_coach),
    foreign key(id_disponibilite) references disponibilite(id_disponibilite)
);

use coachPro;
create table avis(
	id_avis int not null auto_increment,
    id_reservation int not null,
    id_user int not null,
    note int,
    commentaire varchar(255),
    primary key(id_avis),
    foreign key(id_reservation) references reservation(id_reservation),
    foreign key(id_user) references user(id_user)
);
