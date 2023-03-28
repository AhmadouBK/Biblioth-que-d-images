CREATE DATABASE image;
USE image;

CREATE TABLE t_image(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	titre VARCHAR(50) NOT NULL,
	lien VARCHAR(50) NOT NULL,
	description VARCHAR(50) NOT NULL
);

INSERT INTO t_image(titre, lien, description)
VALUES
("Mercedes","images/5.jpg","voiture_jaune"),
("Moto","images/10.jpg","une moto"),
("Mercedes","images/11.jpg","voiture_bleue"),
("Femmes Noires","images/blackness.jpg","deux femmes noires"),
("Belle Femme","images/deux.jpg","une belle femme"),
("Couple","images/trois.jpg","un couple"),
("Iphone","images/adrien-Pvck4ScQH9E-unsplash.jpg","telephone : un iphoneX"),
("Huawei","images/d-c-tr-nh-NEv65ZXjuLg-unsplash.jpg","telephone : huawei P20"),
("Shiwa","images//shiwa-id-Uae7ouMw91A-unsplash.jpg","telephone : Shiwa"),
("MacBook","images/laptop-gd52ad5899_1920.jpg","Ordinateur : Macbook pro");