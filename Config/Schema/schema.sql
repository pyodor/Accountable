

DROP TABLE IF EXISTS `cake_plugin_tester`.`accountable`;


CREATE TABLE `cake_plugin_tester`.`accountable` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`resource` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`actor_id` int(11) NOT NULL,
	`verb` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`object` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	`object_id` int(11) NOT NULL,
	`created` datetime NOT NULL,
	`updated` datetime NOT NULL,	PRIMARY KEY  (`id`),
	KEY `resource` (`resource`, `actor_id`, `verb`, `object`, `object_id`, `created`, `updated`)) 	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

