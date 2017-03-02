CREATE TABLE IF NOT EXISTS user(
    id INT(11) NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100),
    mp VARCHAR(100),
    score INT(10) DEFAULT 0,
    PRIMARY KEY (id)
    );
    
INSERT INTO user (id, nom, mp) VALUES 
    (1, 'user1', 'mp1'),
    (2, 'user2', 'mp2'),
    (3, 'user3', 'mp3');

CREATE TABLE IF NOT EXISTS type(
    id INT(11) NOT NULL AUTO_INCREMENT,
    nom_type VARCHAR(50),
    PRIMARY KEY (id)
);

INSERT INTO type (id, nom_type) VALUES
    (1, 'history'),
    (2, 'geography');

CREATE TABLE IF NOT EXISTS reponse(
    id INT(11) NOT NULL AUTO_INCREMENT,
    intitule_reponse text,
    id_type INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (id_type) references type(id)
);

INSERT INTO reponse (id, intitule_reponse, id_type) VALUES
    (1, 'London', 2);

CREATE TABLE IF NOT EXISTS question(
    id INT(11) NOT NULL AUTO_INCREMENT,
    enonce text,
    id_reponse INT(11),
    id_type INT(11),
    difficulte INT(5),
    PRIMARY KEY (id),
    FOREIGN KEY (id_type) references type(id),
    FOREIGN KEY (id_reponse) references reponse(id)
);


INSERT INTO question (id, enonce, id_reponse, id_type, difficulte) VALUES
    (1, 'What is the UK capital ?', 1, 2,1);