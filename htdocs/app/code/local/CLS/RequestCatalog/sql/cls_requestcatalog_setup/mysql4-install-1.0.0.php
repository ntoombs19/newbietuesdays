<?php

$installer = $this;

$installer->startSetup();

$installer->run("
  
-- DROP TABLE IF EXISTS {$this->getTable('RequestCatalog')};
CREATE TABLE {$this->getTable('RequestCatalog')} (
  `RequestCatalog_id` int(11) unsigned NOT NULL auto_increment,
  `first_name` varchar(255) NOT NULL default '',
  `last_name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `created_time` datetime NULL,
  `update_time` datetime NULL,
  PRIMARY KEY (`RequestCatalog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  
    ");

$installer->endSetup();