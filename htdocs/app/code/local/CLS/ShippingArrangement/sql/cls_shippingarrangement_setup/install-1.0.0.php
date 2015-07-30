<?php
$installer = $this;

$installer->startSetup();

$attribute  = array(
    'type' => 'varchar',
    'backend_type' => 'varchar',
    'frontend_input' => 'varchar',
    'is_user_defined' => true,
    'label' => 'Shipping Arrangement',
    'visible' => true,
    'required' => false,
    'user_defined' => false,
    'default' => NULL,
    'comparable' => false,
    'searchable' => false,
    'filterable' => false
);

$installer->addAttribute('order','shipping_arrangement',$attribute);
$installer->addAttribute('quote','shipping_arrangement',$attribute);

$installer->endSetup();