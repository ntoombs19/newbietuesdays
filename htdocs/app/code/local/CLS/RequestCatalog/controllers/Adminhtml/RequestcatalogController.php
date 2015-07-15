<?php

/**
 *  RequestCatalog adminhtml controller
 *
 * @category    CLS
 * @package     RequestCatalog
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */


class CLS_RequestCatalog_Adminhtml_RequestcatalogController extends Mage_Adminhtml_Controller_Action
{

    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('RequestCatalog/items')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();

    }

    public function editAction()
    {
        $RequestCatalogId     = $this->getRequest()->getParam('id');
            $RequestCatalogModel  = Mage::getModel('cls_requestcatalog/requestcatalog')->load($RequestCatalogId);

            if ($RequestCatalogModel->getId() || $RequestCatalogId == 0) {

        Mage::register('RequestCatalog_data', $RequestCatalogModel);

                $this->loadLayout();
                $this->_setActiveMenu('RequestCatalog/items');

                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
                $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

                $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

                $this->_addContent($this->getLayout()->createBlock('cls_requestcatalog/adminhtml_RequestCatalog_edit'))
                    ->_addLeft($this->getLayout()->createBlock('cls_requestcatalog/adminhtml_RequestCatalog_edit_tabs'));

                $this->renderLayout();
            } else {
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('cls_requestcatalog')->__('Item does not exist'));
        $this->_redirect('*/*/');
    }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        if ( $this->getRequest()->getPost() ) {
            try {
                $postData = $this->getRequest()->getPost();
                $RequestCatalogModel = Mage::getModel('cls_requestcatalog/requestcatalog');

                    $RequestCatalogModel->setId($this->getRequest()->getParam('id'))
                    ->setFirstName($postData['first_name'])
                    ->setLastName($postData['last_name'])
                    ->setEmail($postData['email'])
                    ->setFutureCatalogs(!empty($postData['future_catalogs']))
                    ->save();

                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                    Mage::getSingleton('adminhtml/session')->setRequestCatalogData(false);

                    $this->_redirect('*/*/');
                    return;
                } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setRequestCatalogData($this->getRequest()->getPost());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                    return;
                }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $RequestCatalogModel = Mage::getModel('cls_requestcatalog/requestcatalog');

                    $RequestCatalogModel->setId($this->getRequest()->getParam('id'))
                    ->delete();

                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                    $this->_redirect('*/*/');
                } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    /**
     * Product grid for AJAX request.
     * Sort and filter result for example.
     */
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('cls_requestcatalog/adminhtml_RequestCatalog_grid')->toHtml()
        );
    }
}