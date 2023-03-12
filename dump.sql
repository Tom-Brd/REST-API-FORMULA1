CREATE TABLE `teams` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) NOT NULL,
                         `country` varchar(255) NOT NULL,
                         `team_principal` varchar(255) NOT NULL,
                         `year_of_creation` int(11) NOT NULL,
                         PRIMARY KEY (`id`)
);

CREATE TABLE `circuits` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `name` varchar(255) NOT NULL,
                            `country` varchar(255) NOT NULL,
                            `length` float NOT NULL,
                            `number_of_turns` int(11) NOT NULL,
                            PRIMARY KEY (`id`)
);

CREATE TABLE `drivers` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `nationality` varchar(255) NOT NULL,
    `date_of_birth` date NOT NULL,
    `team_id` int(11) NOT NULL,
    `car_number` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_drivers_teams_idx` (`team_id`),
    CONSTRAINT `fk_drivers_teams` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `teams` (`name`, `country`, `team_principal`, `year_of_creation`) VALUES
    ('Mercedes', 'Germany', 'Toto Wolff', 1954),
    ('Ferrari', 'Italy', 'Mattia Binotto', 1950),
    ('Red Bull Racing', 'Austria', 'Christian Horner', 2005),
    ('Renault', 'France', 'Cyril Abiteboul', 1977),
    ('Haas F1 Team', 'United States', 'Guenther Steiner', 2016),
    ('McLaren', 'United Kingdom', 'Andreas Seidl', 1963),
    ('Racing Point', 'United Kingdom', 'Otmar Szafnauer', 2018),
    ('Alfa Romeo Racing', 'Switzerland', 'Frédéric Vasseur', 1950),
    ('Scuderia Toro Rosso', 'Italy', 'Franz Tost', 2006),
    ('Williams', 'United Kingdom', 'Jost Capito', 1977);

INSERT INTO `circuits` (`name`, `country`, `length`, `number_of_turns`) VALUES
    ('Albert Park Circuit', 'Australia', 5.303, 16),
    ('Bahrain International Circuit', 'Bahrain', 5.412, 15),
    ('Shanghai International Circuit', 'China', 5.451, 16),
    ('Baku City Circuit', 'Azerbaijan', 6.003, 20),
    ('Circuit de Barcelona-Catalunya', 'Spain', 4.655, 16),
    ('Circuit de Monaco', 'Monaco', 3.337, 19),
    ('Circuit Gilles Villeneuve', 'Canada', 4.361, 14),
    ('Circuit Paul Ricard', 'France', 5.842, 15),
    ('Red Bull Ring', 'Austria', 4.318, 9),
    ('Silverstone Circuit', 'UK', 5.891, 18),
    ('Hockenheimring', 'Germany', 4.574, 17),
    ('Hungaroring', 'Hungary', 4.381, 14),
    ('Spa-Francorchamps', 'Belgium', 7.004, 19),
    ('Autodromo Nazionale di Monza', 'Italy', 5.793, 11),
    ('Marina Bay Street Circuit', 'Singapore', 5.063, 23),
    ('Sochi Autodrom', 'Russia', 5.848, 18),
    ('Suzuka Circuit', 'Japan', 5.807, 18),
    ('Circuit of the Americas', 'USA', 5.513, 20),
    ('Autódromo Hermanos Rodríguez', 'Mexico', 4.304, 17),
    ('Yas Marina Circuit', 'UAE', 5.554, 21);

INSERT INTO `drivers` (`name`, `nationality`, `date_of_birth`, `team_id`, `car_number`) VALUES
    ('Lewis Hamilton', 'British', '1985-01-07', 0, 44),
    ('Valtteri Bottas', 'Finnish', '1989-08-28', 0, 77),
    ('Sebastian Vettel', 'German', '1987-07-03', 1, 5),
    ('Charles Leclerc', 'Monegasque', '1997-10-16', 1, 16),
    ('Max Verstappen', 'Dutch', '1997-09-30', 2, 33),
    ('Alexander Albon', 'Thai', '1996-03-23', 2, 23),
    ('Sergio Perez', 'Mexican', '1990-01-26', 6, 11),
    ('Lance Stroll', 'Canadian', '1998-10-29', 6, 18),
    ('Daniel Ricciardo', 'Australian', '1989-07-01', 3, 3),
    ('Esteban Ocon', 'French', '1996-09-17', 3, 31),
    ('Pierre Gasly', 'French', '1996-02-07', 8, 10),
    ('Daniil Kvyat', 'Russian', '1994-04-26', 8, 26),
    ('Kimi Raikkonen', 'Finnish', '1979-10-17', 7, 7),
    ('Antonio Giovinazzi', 'Italian', '1993-12-14', 7, 99),
    ('Romain Grosjean', 'French', '1986-04-17', 4, 8),
    ('Kevin Magnussen', 'Danish', '1992-10-05', 4, 20),
    ('George Russell', 'British', '1998-02-15', 9, 63),
    ('Nicholas Latifi', 'Canadian', '1995-06-29', 9, 6);