<?php
class CLS_RequestCatalog_Block_RequestCatalog extends Mage_Core_Block_Template
{
    public function getRequestCatalogCollection(){
        return Mage::getModel('cls_requestcatalog/requestcatalog')->getCollection();
    }

    public function getRequestCatalogSave(){
        return $this->getURL('requestcatalog/index/save');
    }

    public function getBaseUrlMedia(){
        return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
    }
}