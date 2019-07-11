CREATE TABLE `examenw`.`solicitud` (
  `yiul_codigo` BIGINT(13) NOT NULL AUTO_INCREMENT,
  `yiul_plugin` VARCHAR(128) NULL,
  `yiul_estado` CHAR(3) NULL,
  `yiul_urlhomepage` VARCHAR(128) NULL,
  `yiul_urlcdn` VARCHAR(128) NULL,
  PRIMARY KEY (`yiul_codigo`));
