<?php
class CLS_RequestCatalog_Model_Resource_RequestCatalog_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * This method is required to build collections using
     * Mage::getModel('<module>/<module>')->getCollection();
     */
    public function _construct()
    {
        $this->_init('cls_requestcatalog/requestcatalog');
    }
}