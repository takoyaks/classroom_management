
CREATE DATABASE classroom_management;

USE classroom_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher') NOT NULL
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    class VARCHAR(50) NOT NULL,
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES users(id)
);

INSERT INTO users (username, password, role) 
VALUES 
('teacher1', 'password123', 'teacher'),
('student1', 'password123', 'student');

INSERT INTO students (name, email, class, teacher_id) 
VALUES
('Barro, Randell Angelo F.', 'randell.barro@example.com', 'BSInfoTech 3E', 1),
('Din, Jared Austin M.', 'jared.din@example.com', 'BSInfoTech 3E', 1),
('Gonzales, Carl Andrae A.', 'carl.gonzales@example.com', 'BSInfoTech 3E', 1),
('Isorena, Dave Andrew E.', 'dave.isorena@example.com', 'BSInfoTech 3E', 1),
('Perez, Gian Carlo T.', 'gian.perez@example.com', 'BSInfoTech 3E', 1),
('Sanchez, John Carl S.', 'john.sanchez@example.com', 'BSInfoTech 3E', 1),
('Santos, Jeezrel John O.', 'jeezrel.santos@example.com', 'BSInfoTech 3E', 1),
('Tatad, Zedric T.', 'zedric.tatad@example.com', 'BSInfoTech 3E', 1),
('Tuazon, Mark Leonard T.', 'mark.tuazon@example.com', 'BSInfoTech 3E', 1),
('Tulod, John Sydney T.', 'john.tulod@example.com', 'BSInfoTech 3E', 1),
('Vitalicio, John Ray A.', 'john.vitalicio@example.com', 'BSInfoTech 3E', 1),
('Capistrano, Allyza F.', 'allyza.capistrano@example.com', 'BSInfoTech 3E', 1),
('De Leon, Maria Alexis C.', 'maria.deleon@example.com', 'BSInfoTech 3E', 1),
('Eusebio, Edna D.', 'edna.eusebio@example.com', 'BSInfoTech 3E', 1),
('Fernandez, Dianne F.', 'dianne.fernandez@example.com', 'BSInfoTech 3E', 1),
('Fernandez, Ronalyn S.', 'ronalyn.fernandez@example.com', 'BSInfoTech 3E', 1),
('Jardiel, Kimberly L.', 'kimberly.jardiel@example.com', 'BSInfoTech 3E', 1),
('Nazareno, Gisselle S.', 'gisselle.nazareno@example.com', 'BSInfoTech 3E', 1),
('Onan, Hannah Argielane A.', 'hannah.onan@example.com', 'BSInfoTech 3E', 1),
('Rodriguez, Rica Mae T.', 'rica.rodriguez@example.com', 'BSInfoTech 3E', 1),
('San Juan, Mary Joy C.', 'mary.sanjuan@example.com', 'BSInfoTech 3E', 1),
('Santilla, Michelle P.', 'michelle.santilla@example.com', 'BSInfoTech 3E', 1),
('Sarmiento, Justine Mae S.', 'justine.sarmiento@example.com', 'BSInfoTech 3E', 1),
('Teves, Roxanne G.', 'roxanne.teves@example.com', 'BSInfoTech 3E', 1),
('Togono, Mikka Ella T.', 'mikka.togono@example.com', 'BSInfoTech 3E', 1),
('Tomboc, Jozel', 'jozel.tomboc@example.com', 'BSInfoTech 3E', 1),
('Traqueña, Christina Marie M.', 'christina.traquena@example.com', 'BSInfoTech 3E', 1),
('Turreda, Ana Carmela A.', 'ana.turreda@example.com', 'BSInfoTech 3E', 1),
('Tusi, Kleian Kaye T.', 'kleian.tusi@example.com', 'BSInfoTech 3E', 1),
('Vargas, Abegail F.', 'abegail.vargas@example.com', 'BSInfoTech 3E', 1),
('Velasco, Donita P.', 'donita.velasco@example.com', 'BSInfoTech 3E', 1),
('Vicente, Vienna P.', 'vienna.vicente@example.com', 'BSInfoTech 3E', 1);
