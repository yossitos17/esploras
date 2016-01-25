use esploras;

DROP TABLE if exists `archivos`, `docform`, `documentos`, `formato`, `usuarios`;

CREATE TABLE if not exists `esploras`.`usuarios` (
    `id` INT(15) NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(20) NOT NULL,
    `password` VARCHAR(300) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `rol` SET('Administrador', 'Registrado', 'Invitado') NOT NULL default 'Registrado',
    `cuota_disp` INT NOT NULL default '1024',
    `cuota_total` INT NOT NULL default '1024',
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE TABLE if not exists `esploras`.`documentos` (
    `id_documento` INT(20) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(30) NOT NULL,
    `descripcion` TEXT,
    `fecha_subida` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `publico` BOOLEAN NULL DEFAULT NULL,
	`id_usuario` INT(15) NOT NULL,
    PRIMARY KEY (`id_documento`),
	foreign key (id_usuario) references usuarios(id)
)  ENGINE=InnoDB;

create table if not exists `esploras`.`formato` (
	`id_formato` int(20) not null auto_increment,
	`nombre` varchar(30),
	primary key (id_formato)
) ENGINE=InnoDB;

create table if not exists `esploras`.`docform` (
	`id_documento` INT(20) NOT NULL,
	`id_formato` int(20) not null,
	`url` varchar(50) not null,
	primary key (url),
	FOREIGN KEY (id_documento) REFERENCES documentos(id_documento),
	FOREIGN KEY (id_formato) REFERENCES formato(id_formato)
)ENGINE=InnoDB;

insert into usuarios (login, password, email, rol) values('admin', PASSWORD('Jairo2000'), 'esploras@openmailbox.org', 'Administrador')