CREATE TABLE IF NOT EXISTS `verifica_db`.`usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(64) NULL,
	`apellido` VARCHAR(64) NULL,
	`telefono` VARCHAR(16) NULL,
	`correo` VARCHAR(120) NULL,
	`log_correo` VARCHAR(120) NULL,
	`log_password` VARCHAR(32) NULL,
	`provincia_id` INT NOT NULL,
	`localidad_id` INT NOT NULL,
	`validado` INT NULL,
	`keymaster` VARCHAR(32) NULL,
	`estado` INT NULL,
	`creado` DATETIME NULL,
	`actualizado` DATETIME NULL,
	PRIMARY KEY (`id`)
)ENGINE = InnoDB;

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `log_correo`, `log_password`, `provincia_id`, `localidad_id`, `validado`, `keymaster`, `estado`, `creado`, `actualizado`) VALUES
(1, 'Jonathan', 'Llamas', '2604513650', 'llamasjonat@gmail.com', 'demo@verifica.me', 'c514c91e4ed341f263e458d44b3bb0a7', 0, 0, 1, NULL, 1, '2019-07-08 20:07:25', '2019-07-08 20:07:25');