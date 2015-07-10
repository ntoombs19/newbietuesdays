<?php

class CLS_RequestCatalog_Model_RequestCatalog extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('<module>/<module>');
    }
}

