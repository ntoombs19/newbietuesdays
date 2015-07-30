<?php

class CLS_ShippingArrangement_Model_Observer
{
    /**
     * @param $observer
     */
    public function customDataSave($observer){
        $session = Mage::getSingleton("core/session");
        $shipping_arrangement = $session->getShippingArrangement
        $event = $observer->getEvent();
        $order = $event->getOrder();
        $order->setShippingArrangement($shipping_arrangement);
    }

    /**
     * @param $evt
     */
    public function saveQuoteBefore($evt){
        $session = Mage::getSingleton("core/session");
        $quote = $evt->getQuote();
        $post = Mage::app()->getFrontController()->getRequest()->getPost();
        if(isset($post['shipping_arrangement'])){
            $var = $post['shipping_arrangement'];
            $quote->setShippingArrangement($var);
            $session->setShippingArrangement($var);
        }
    }
}