<?php

/**
 *  Adminhtml block
 *
 * @category    CLS
 * @package     RequestCatalog
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */


class CLS_RequestCatalog_Block_Adminhtml_RequestCatalog extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_requestcatalog';
        $this->_blockGroup = 'cls_requestcatalog';
        $this->_headerText = Mage::helper('cls_requestcatalog')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('cls_requestcatalog')->__('Add Item');
        parent::__construct();
    }

}