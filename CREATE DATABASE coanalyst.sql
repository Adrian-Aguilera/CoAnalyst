CREATE DATABASE coanalyst;
CREATE TABLE usuarios (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);
CREATE TABLE estadisticas (
    consulta_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    tiempo_ejecucion VARCHAR(255) NULL,
    complejidad VARCHAR(255) NULL,
    memoria_usada VARCHAR(255) NULL,
    estado VARCHAR(255) NULL,
    FOREIGN KEY (user_id) REFERENCES usuarios(user_id)
);

ALTER TABLE estadisticas DROP FOREIGN KEY estadisticas_ibfk_1;
ALTER TABLE estadisticas ADD CONSTRAINT estadisticas_ibfk_1 FOREIGN KEY (user_id) REFERENCES usuarios (user_id) ON DELETE CASCADE;
