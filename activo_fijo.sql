CREATE TABLE IF NOT EXISTS areas_trabajo (
	id_areas_trabajo INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(150) NOT NULL,
	PRIMARY KEY (id_areas_trabajo)
);

CREATE TABLE IF NOT EXISTS personas (
	id_persona INT NOT NULL AUTO_INCREMENT,
	nombres VARCHAR(150) NOT NULL,
	n_carnet VARCHAR(45) NOT NULL,
	areas_trabajo_id INT NOT NULL,
	PRIMARY KEY (id_persona),
	CONSTRAINT fk_personas_areas_trabajo1 FOREIGN KEY (areas_trabajo_id) REFERENCES areas_trabajo (id_areas_trabajo)
);

CREATE TABLE IF NOT EXISTS tipo_activo (
	id_tipo_activo INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45) NOT NULL,
	PRIMARY KEY (id_tipo_activo)
);

CREATE TABLE IF NOT EXISTS activos_fijos (
	id_activo_fijo INT NOT NULL AUTO_INCREMENT,
	codigo VARCHAR(12) NOT NULL,
	tipo_activo_id INT NOT NULL,
	descripcion TEXT NOT NULL,
	PRIMARY KEY (id_activo_fijo),
	CONSTRAINT fk_activos_fijos_tipo_activo1 FOREIGN KEY (tipo_activo_id) REFERENCES tipo_activo (id_tipo_activo)
);

CREATE TABLE IF NOT EXISTS historial_asignaciones (
	id_historial_asignaciones INT NOT NULL AUTO_INCREMENT,
	fecha_asignacion DATE NOT NULL,
	personas_id INT NOT NULL,
	activos_fijos_id INT NOT NULL,
	PRIMARY KEY (id_historial_asignaciones),
	CONSTRAINT fk_historial_asignaciones_personas1 FOREIGN KEY (personas_id) REFERENCES personas (id_persona),
	CONSTRAINT fk_historial_asignaciones_activos_fijos1 FOREIGN KEY (activos_fijos_id) REFERENCES activos_fijos (id_activo_fijo)
);

CREATE TABLE IF NOT EXISTS asignaciones (
	id_asignaciones INT NOT NULL AUTO_INCREMENT,
	personas_id INT NOT NULL,
	activos_fijos_id INT NOT NULL,
	PRIMARY KEY (id_asignaciones),
	CONSTRAINT fk_asignaciones_personas1 FOREIGN KEY (personas_id) REFERENCES personas (id_persona),
	CONSTRAINT fk_asignaciones_activos_fijos1 FOREIGN KEY (activos_fijos_id) REFERENCES activos_fijos (id_activo_fijo)
);
 
INSERT INTO areas_trabajo(nombre) VALUES('Call center');
INSERT INTO areas_trabajo(nombre) VALUES('Soporte cajeros');
INSERT INTO areas_trabajo(nombre) VALUES('Desarrollo');
INSERT INTO areas_trabajo(nombre) VALUES('Cumplimiento');
INSERT INTO areas_trabajo(nombre) VALUES('Recursos humano');
INSERT INTO areas_trabajo(nombre) VALUES('Contabilidad');
INSERT INTO areas_trabajo(nombre) VALUES('Ventas');
 
INSERT INTO personas(nombres, n_carnet, areas_trabajo_id)
VALUES
('Douglas Mejia', 'DM123', 3),
('Mariela Martinez', 'MM347', 3),
('Edgar Garcia', 'EG676', 3),
('Edward Moreno', 'EM346', 3),
('Josue Rivas', 'JR794', 3),
('Kevin Funes', 'KF233', 3),
('Juan Perez', 'JP893', 1),
('Pedro Perez', 'PP234', 1),
('Juana Hernandez', 'JH234', 2),
('Jose Sanchez', 'JS890', 2)
;
 
INSERT INTO tipo_activo(nombre)
VALUES
('Mouse'),
('Monitor'),
('Escritorio'),
('Laptop'),
('Librera'),
('Silla'),
('Pizarra'),
('Teclado')
;
 
INSERT INTO activos_fijos(codigo, tipo_activo_id, descripcion) VALUES('LAV23287', 4, 'Laptop ASUS Vivobook');
INSERT INTO activos_fijos(codigo, tipo_activo_id, descripcion) VALUES('LAV89923', 4, 'Laptop ASUS Vivobook');
INSERT INTO activos_fijos(codigo, tipo_activo_id, descripcion) VALUES('M873', 4, 'Laptop ASUS Vivobook');
INSERT INTO activos_fijos(codigo, tipo_activo_id, descripcion) VALUES('M398', 4, 'Laptop ASUS Vivobook');
 
INSERT INTO asignaciones(personas_id, activos_fijos_id) VALUES(2, 2);
INSERT INTO asignaciones(personas_id, activos_fijos_id) VALUES(3, 3);
INSERT INTO asignaciones(personas_id, activos_fijos_id) VALUES(4, 1);
 
INSERT INTO historial_asignaciones(personas_id, activos_fijos_id, fecha_asignacion) VALUES(1, 1, '2023-02-23');
INSERT INTO historial_asignaciones(personas_id, activos_fijos_id, fecha_asignacion) VALUES(2, 2, '2023-05-12');
INSERT INTO historial_asignaciones(personas_id, activos_fijos_id, fecha_asignacion) VALUES(3, 3, '2023-06-08');
INSERT INTO historial_asignaciones(personas_id, activos_fijos_id, fecha_asignacion) VALUES(4, 1, '2023-09-21');
