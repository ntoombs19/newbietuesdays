<?php
class CLS_RequestCatalog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        //Get current layout state
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        $collection = Mage::getModel('cls_requestcatalog/requestcatalog');
        $post = $this->getRequest()->getPost();

        $collection->setData('first_name', $post['first_name']);
        $collection->setData('last_name', $post['last_name']);
        $collection->setData('email', $post['email']);
        $collection->setData('future_catalogs', $post['future_catalogs']);
        $collection->save();

        header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/requestcatalog/index/success");
        exit();
    }

    public function successAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
}