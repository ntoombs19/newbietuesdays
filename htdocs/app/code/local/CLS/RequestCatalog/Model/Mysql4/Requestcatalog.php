<?php

class CLS_RequestCatalog_Model_Mysql4_RequestCatalog extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
{
    $this->_init('RequestCatalog/RequestCatalog', 'RequestCatalog_id');
}
}