<?php
class CLS_ShippingArrangement_Block_Shippingarrangement extends Mage_Checkout_Block_Onepage_Abstract
{
    /**
     * @return mixed
     */
    public function getShippingArrangement()
    {
        $model = Mage::getModel('sales/order');
        return $model->load($this->getOrder()->getId())->getShippingArrangement();
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return Mage::registry('current_order');
    }

}