<?php

class CLS_RequestCatalog_Model_Mysql4_RequestCatalog_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
{
    //parent::__construct();
    $this->_init('RequestCatalog/RequestCatalog');
}
}