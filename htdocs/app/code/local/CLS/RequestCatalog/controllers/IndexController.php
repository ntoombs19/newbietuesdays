<?php
class CLS_RequestCatalog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        //Get current layout state
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * The collection variable creates a new model (row) for the database
     * The post variable retrieves a key/value array of the post data
     * The post data is assigned to the corresponding fields outlined in the model
     * Finally the collection is saved to the database which adds the row
     * The user is redirected to the success page
     */
    public function saveAction()
    {
        $model = Mage::getModel('cls_requestcatalog/requestcatalog');
        $post = $this->getRequest()->getPost();
        // It is not necessary to add the id to the collection
        $model->setData('first_name', $post['first_name']);
        $model->setData('last_name', $post['last_name']);
        $model->setData('email', $post['email']);
        $model->setData('future_catalogs', $post['future_catalogs']);
        $model->save();

        header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/requestcatalog/index/success");
        exit();
    }

    public function successAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
}