CREATE USER 'admin'@'localhost' IDENTIFIED BY 'qazwsx';
CREATE USER 'viewer'@'localhost' IDENTIFIED BY 'qazwsx';
GRANT INSERT, UPDATE, DELETE, SELECT ON sks.zawodnicy TO 'admin'@'localhost';
GRANT SELECT ON sks.zawodnicy TO 'viewer'@'localhost';