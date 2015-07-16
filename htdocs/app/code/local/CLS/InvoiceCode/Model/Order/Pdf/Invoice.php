<?php

/**
 *
 *
 * @category    CLS
 * @package
 * @author      Nathan Toombs <nathan.toombs@classyllama.com>
 * @copyright   Copyright (c) 2015 Classy Llama
 */

class CLS_InvoiceCode_Model_Order_Pdf_Invoice extends Mage_Sales_Model_Order_Pdf_Invoice
{
    public function insertOrder(&$page, $obj, $putOrderId = true)
    {
        parent::insertOrder($page, $obj, $putOrderId = true);
        if ($obj instanceof Mage_Sales_Model_Order) {
            $order = $obj;
        } elseif ($obj instanceof Mage_Sales_Model_Order_Shipment) {
            $order = $shipment->getOrder();
        }
        /* Define a font path that is readable by the web server */
        $fontPath = Mage::getBaseDir('lib').'/free3of9/fre3of9x.TTF';

        /* Load the font */
        $page->setFont(Zend_Pdf_Font::fontWithPath($fontPath), 50);


        /* Create barcode string. */
        /* Note: Asterisks are required for code39 */
        $barcodeImage = "*".$order->getRealOrderId()."*";

        $page->setFillColor(new Zend_Pdf_Color_GrayScale(1));
        $page->setLineColor(new Zend_Pdf_Color_GrayScale(1));
        $page->drawRectangle(340, 795, 560, 750);


        $page->setFillColor(new Zend_Pdf_Color_GrayScale(0));
        $page->setLineColor(new Zend_Pdf_Color_GrayScale(0));
        /* Insert the barcode into the page */
        $page->drawText($barcodeImage, 345, 753);
    }
}