<?php

/**
 * Adminhtml edit tab form
 *
 * @category    CLS
 * @package
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */

class CLS_RequestCatalog_Block_Adminhtml_RequestCatalog_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $model = Mage::registry('RequestCatalog_data'); // NOTE registry('example_data'); NOT registry('example_data')->getData();

        $fieldset = $form->addFieldset('RequestCatalog_form', array('legend'=>Mage::helper('cls_requestcatalog')->__('Item information')));

        //this variable is necessary to set the future_catalog checkbox to true or false on the edit page
        //and to set it to blank on the new page
        //it is logically correct but syntactically a little hard to read. consider changing
        $futureCatalogsChecked = isset($model->_origData['future_catalogs']) ? ((int)$model->_origData['future_catalogs'] > 0 ? 'checked' : '') : '';

        $fieldset->addField('first_name', 'text', array(
            'label'     => Mage::helper('cls_requestcatalog')->__('First Name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'first_name'
        ));
        $fieldset->addField('last_name', 'text', array(
            'label'     => Mage::helper('cls_requestcatalog')->__('Last Name'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'last_name'
        ));
        $fieldset->addField('email', 'text', array(
            'label'     => Mage::helper('cls_requestcatalog')->__('Email'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'email'
        ));
        $fieldset->addField('future_catalogs', 'checkbox', array(
            'label'     => Mage::helper('cls_requestcatalog')->__('Receive Future Catalogs'),
            'class'     => '',
            'required'  => false,
            'onclick'   => 'this.value = this.checked ? 1 : 0;',
            'checked'   => $futureCatalogsChecked,
            'name'      => 'future_catalogs'
        ));

        if ( Mage::getSingleton('adminhtml/session')->getRequestCatalogData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getRequestCatalogData());
            Mage::getSingleton('adminhtml/session')->setRequestCatalogData(null);
        } elseif ( Mage::registry('RequestCatalog_data') ) {
            $form->setValues(Mage::registry('RequestCatalog_data')->getData());
        }
        return parent::_prepareForm();
    }
}