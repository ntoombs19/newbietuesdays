<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('cls_requestcatalog/requestcatalog'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('first_name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'First_Name')
    ->addColumn('last_name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ), 'Last_Name')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => false,
    ), 'Email')
    ->addColumn('future_catalogs', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, array(
        'nullable'  => true,
    ), 'future_catalogs');

$installer->getConnection()->createTable($table);