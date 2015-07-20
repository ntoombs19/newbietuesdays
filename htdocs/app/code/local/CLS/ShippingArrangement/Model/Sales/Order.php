<?php
class CLS_ShippingArrangement_Model_Sales_Order extends Mage_Sales_Model_Order
{
    /**
     * @return bool
     */
    public function hasCustomFields()
    {
        $var    =  $this->getShippingArrangement();
        if($var && !empty($var)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return string
     */
    public function getFieldHtml(){
        $var    =  $this->getShippingArrangement();
        //Mage::log($var);
        $html = '<b>Shipping Arrangement:</b>'.$var.'<br/>';
        // Mage::log($html);
        return $html;
    }
}