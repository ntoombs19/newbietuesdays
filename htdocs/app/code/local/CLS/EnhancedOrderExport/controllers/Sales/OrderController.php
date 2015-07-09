<?php

$defController = Mage::getBaseDir()
    . DS . 'app' . DS . 'code' . DS . 'core'
    . DS . 'Mage' . DS . 'Adminhtml' . DS . 'controllers'
    . DS . 'Sales' . DS . 'OrderController.php';

require_once $defController;

class CLS_EnhancedOrderExport_Sales_OrderController extends Mage_Adminhtml_Sales_OrderController
{

    /**
     * Export order grid to CSVi format
     */
    public function exportCsvEnhancedAction()
    {
        $fileName   = 'orders-' . gmdate('YmdHis') . '.csv';
        $grid       = $this->getLayout()->createBlock('CLS_EnhancedOrderExport/sales_order_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFileEnhanced());
    }


}