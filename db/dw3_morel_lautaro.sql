DROP DATABASE IF EXISTS dw3_morel_lautaro;
CREATE DATABASE IF NOT EXISTS dw3_morel_lautaro;
USE dw3_morel_lautaro;

#tabla tipousuarios
CREATE TABLE IF NOT EXISTS tipousuarios(
	id TINYINT(1) UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	tipousuario VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=INNODB;

#tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios(
	usuario_id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(45),
	apellido VARCHAR(45),
	email VARCHAR(45) UNIQUE NOT NULL,
	contraseña VARCHAR(255),
	usuario VARCHAR(45) NOT NULL,
	tipousuarios_id TINYINT(1) UNSIGNED DEFAULT 2,
	PRIMARY KEY(usuario_id),
	FOREIGN KEY (tipousuarios_id) REFERENCES tipousuarios(id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;

#tabla colores
CREATE TABLE IF NOT EXISTS colores(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	color VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=INNODB;

#tabla categorias
CREATE TABLE IF NOT EXISTS categorias(
	id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	categoria VARCHAR(45) NOT NULL,
	PRIMARY KEY(id)
)ENGINE=INNODB;

#tabla productos
CREATE TABLE IF NOT EXISTS productos(
	producto_id INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(45) NOT NULL,
	precio DECIMAL(5, 0) UNSIGNED NOT NULL,
	imagen VARCHAR(100) NOT NULL,
	descripcion TEXT NOT NULL,
	codigo SMALLINT UNSIGNED NOT NULL,
	marca VARCHAR(100) NOT NULL,
	colores_id INT UNSIGNED NOT NULL,
	categorias_id INT UNSIGNED NOT NULL,
	PRIMARY KEY (producto_id),
	FOREIGN KEY (colores_id) REFERENCES colores(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (categorias_id) REFERENCES categorias(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

#tabla usuarios_compras
CREATE TABLE IF NOT EXISTS usuarios_compras(
	id_compra INT UNSIGNED UNIQUE AUTO_INCREMENT NOT NULL,
	fecha_compra DATETIME NOT NULL,
	cantidad INT NOT NULL,
	precio_unidad DECIMAL(5, 0) UNSIGNED NOT NULL,
	precio_total DECIMAL(5, 0) UNSIGNED NOT NULL,
	usuarios_usuario_id INT UNSIGNED NOT NULL,
	productos_producto_id INT UNSIGNED NOT NULL,
	PRIMARY KEY(id_compra),
	FOREIGN KEY (usuarios_usuario_id) REFERENCES usuarios(usuario_id) ON UPDATE CASCADE ON DELETE NO ACTION,
	FOREIGN KEY (productos_producto_id) REFERENCES productos(producto_id) ON UPDATE CASCADE ON DELETE NO ACTION
)ENGINE=INNODB;
		
#INSERT

#tipousuarios
INSERT INTO tipousuarios SET id = 1, tipousuario = "Administrador";
INSERT INTO tipousuarios SET id = 2, tipousuario = "Usuario";

#usuarios
INSERT INTO usuarios 
(nombre, apellido, email, contraseña, usuario, tipousuarios_id)
VALUES
('juan', 'perez', 'juanperez@gmail.com', '$2y$10$8i5fmUj9mp6B.R4Hu3BebuIFe/LYGedQJPkQpnyfCLsRLznk8uCom', 'juanperez', 1),
('pepe', 'sanchez', 'pepesanchez@gmail.com', '$2y$10$8i5fmUj9mp6B.R4Hu3BebuIFe/LYGedQJPkQpnyfCLsRLznk8uCom', 'pepesanchez', 2),
('maría', 'garcía', 'mariagarcia@gmail.com', '$2y$10$8i5fmUj9mp6B.R4Hu3BebuIFe/LYGedQJPkQpnyfCLsRLznk8uCom', 'mariagarcia', 2);

#colores
INSERT INTO colores SET id = 1, color = "sin color"; 
INSERT INTO colores SET id = 2, color = "otro/s"; 
INSERT INTO colores SET id = 3, color = "rojo"; 
INSERT INTO colores SET id = 4, color = "naranja"; 
INSERT INTO colores SET id = 5, color = "amarillo"; 
INSERT INTO colores SET id = 6, color = "verde"; 
INSERT INTO colores SET id = 7, color = "celeste"; 
INSERT INTO colores SET id = 8, color = "azul"; 
INSERT INTO colores SET id = 9, color = "violeta";
INSERT INTO colores SET id = 10, color = "blanco"; 
INSERT INTO colores SET id = 11, color = "negro"; 
INSERT INTO colores SET id = 12, color = "verde"; 
INSERT INTO colores SET id = 13, color = "rosa"; 
INSERT INTO colores SET id = 14, color = "gris"; 

#categorias
INSERT INTO categorias SET id = 1, categoria = "Librería Artística"; 
INSERT INTO categorias SET id = 2, categoria = "Librería Comercial"; 
INSERT INTO categorias SET id = 3, categoria = "Librería Escolar"; 

#productos
INSERT INTO productos 
(nombre, precio, imagen, descripcion, codigo, marca, colores_id, categorias_id)
VALUES
('cuaderno spiderman', 1200, 'cuaderno_spiderman.jpg', 'cuaderno de tapa dura con imagen de spider-man en el frente', 1547, 'proarte', 7, 3),
('lapiz H4', 75, 'lapiz.jpg', 'Lápiz H4 para dibujo técnico', 1681, 'staedtler', 4, 3),
('cartuchera de tubo', 475, 'cartuchera_tubo.jpg', 'cartuchera de tubo para llevar tus útiles, perfecta para transportar sin que ocupe demasiado lugar. Su tela es de lona.', 1024, 'genérico', 8, 3),
('cartulina lisa', 200, 'cartulina_verde.jpg', 'cartulina lisa de color', 1430, 'genérico', 6, 3),
('sacapuntas', 150, 'sacapuntas_maped.jpg', 'sacapuntas de marca maped para lápices', 1749, 'maped', 11, 3),
('cuaderno tapa roja duro', 800, 'cuaderno_tapa_dura_exito.png', 'cuaderno marca éxito tapa dura para escuela', 1301, 'éxito', 3, 3),
('cuaderno tapa dura azul', 800, 'cuaderno_tapa_dura_rivadavia.jpg', 'cuaderno marca rivadavia tapa dura para escuela', 1743, 'rivadavia', 8, 3),
('cinta adhesiva', 250, 'cinta.png', 'cinta para embalar o unir objetos', 2153, 'scotch', 1, 2),
('paleta de pintura', 1300, 'paleta_colores.png', 'paleta para poner los diferentes colores de pintura', 3528, 'genérico', 2, 1),
('calculadora científica', 1500, 'calculadora_casio.png', 'calculadora científica profesional tanto para el colegio como oficina de uso personal', 2910, 'casio', 14, 2),
('abrochadora', 1250, 'abrochadora.png', 'abrochadora de tipo gancho para unir papeles, cartones, o cualquier otros elementos frágiles', 2098, 'genérico', 14, 2);