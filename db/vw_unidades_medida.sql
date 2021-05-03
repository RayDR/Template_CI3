CREATE OR REPLACE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `sipat`.`vw_unidades_medida` AS SELECT
	`unidades_medida`.`unidad_medida_id` AS `unidad_medida_id`,
	`unidades_medida`.`cve_medida` AS `cve_medida`,
	`unidades_medida`.`descripcion` AS `descripcion`,
	`aum`.`direccion_id` AS `direccion_id`,
	`direcciones`.`cve_direccion` AS `cve_direccion`,
	`direcciones`.`descripcion` AS `direccion`,
	`unidades_medida`.`estatus` AS `estatus` 
FROM
	((
			`unidades_medida`
			JOIN `areas_unidades_medidas` `aum` ON ((
					`aum`.`unidad_medida_id` = `unidades_medida`.`unidad_medida_id` 
				)))
		JOIN `direcciones` ON ((
			`direcciones`.`direccion_id` = `aum`.`direccion_id` 
	)));