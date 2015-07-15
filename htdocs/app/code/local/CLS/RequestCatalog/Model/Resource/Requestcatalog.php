<?php

/**
 * Created by PhpStorm.
 * User: nathantoombs
 * Date: 7/10/15
 * Time: 3:52 PM
 */

class CLS_RequestCatalog_Model_Resource_Requestcatalog extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('cls_requestcatalog/requestcatalog', 'id');
    }
}

