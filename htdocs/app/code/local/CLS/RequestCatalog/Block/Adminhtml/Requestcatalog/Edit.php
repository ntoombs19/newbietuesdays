<?php

/**
 *  Adminhtml edit block
 *
 * @category    CLS
 * @package     RequestCatalog
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */

class CLS_RequestCatalog_Block_Adminhtml_RequestCatalog_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'cls_requestcatalog';
        $this->_controller = 'adminhtml_RequestCatalog';

        $this->_updateButton('save', 'label', Mage::helper('cls_requestcatalog')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('cls_requestcatalog')->__('Delete Item'));
    }

    public function getHeaderText()
    {
        if( Mage::registry('RequestCatalog_data') && Mage::registry('RequestCatalog_data')->getId() ) {
            return Mage::helper('cls_requestcatalog')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('RequestCatalog_data')->getFirstName()));
        } else {
            return Mage::helper('cls_requestcatalog')->__('Add Item');
        }
    }
}