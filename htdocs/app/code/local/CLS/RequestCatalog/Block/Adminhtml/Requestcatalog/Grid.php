<?php

/**
 * Adminhtml Grid
 *
 * @category    CLS
 * @package     RequestCatalog
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */

class CLS_RequestCatalog_Block_Adminhtml_RequestCatalog_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('RequestCatalogGrid');
        // This is the primary key of the database
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('cls_requestcatalog/requestcatalog')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header'    => Mage::helper('cls_requestcatalog')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'id',
        ));
        $this->addColumn('first_name', array(
            'header'    => Mage::helper('cls_requestcatalog')->__('First Name'),
            'align'     =>'left',
            'index'     => 'first_name',
        ));
        $this->addColumn('last_name', array(
            'header'    => Mage::helper('cls_requestcatalog')->__('Last Name'),
            'align'     =>'left',
            'index'     => 'last_name',
        ));
        $this->addColumn('email', array(
            'header'    => Mage::helper('cls_requestcatalog')->__('Email'),
            'align'     =>'left',
            'index'     => 'email',
        ));
        $this->addColumn('future_catalogs', array(
            'header'    => Mage::helper('cls_requestcatalog')->__('Recieve future catalogs'),
            'align'     =>'left',
            'index'     => 'future_catalogs',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }


}