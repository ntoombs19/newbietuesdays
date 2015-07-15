<?php

/**
 *
 *
 * @category    CLS
 * @package
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */

class CLS_RequestCatalog_Block_Adminhtml_RequestCatalog_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('RequestCatalog_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('cls_requestcatalog')->__('News Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('cls_requestcatalog')->__('Item Information'),
            'title'     => Mage::helper('cls_requestcatalog')->__('Item Information'),
            'content'   => $this->getLayout()->createBlock('cls_requestcatalog/adminhtml_RequestCatalog_edit_tab_form')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}