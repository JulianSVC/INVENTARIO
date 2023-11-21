CREATE DATABASE productos; USE productos;

CREATE TABLE productos ( 
     id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(100) NOT NULL
);