CREATE SCHEMA `examenw` ;
--CREATE USER 'examenw'@'127.0.0.1' IDENTIFIED BY 'examen2';
ALTER USER 'examenw'@'127.0.0.1' IDENTIFIED WITH mysql_native_password BY 'examen2'; 
GRANT ALL ON examenw.* TO 'examenw'@'127.0.0.1';
