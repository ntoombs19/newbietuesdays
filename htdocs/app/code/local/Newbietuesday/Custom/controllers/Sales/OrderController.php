<?php
/**
 * OrderController.php
 *
 * @category   CLS
 * @package
 * @author     Chris Huffman <chris.huffman@classyllama.com>
 * @copyright  Copyright (c) 2015 Classy Llama Studios, LLC
 */
//require_once(BP . '/app/code/core/Mage/Adminhtml/controllers/Sales/OrderController.php');

class CLS_Custom_Sales_OrderController extends Mage_Adminhtml_Sales_OrderController {
    public function testAction() {
        $gridBlock = $this->getLayout()->createBlock('cls_custom/sales_order_grid');

        $gridCsv = $gridBlock->getCsv();
        $this->getResponse()->appendBody($gridCsv);

        $this->renderLayout();
    }
}
