<?php
/**
 * Grid.php
 *
 * @category   CLS
 * @package
 * @author     Chris Huffman <chris.huffman@classyllama.com>
 * @copyright  Copyright (c) 2015 Classy Llama Studios, LLC
 */
class CLS_Custom_Block_Sales_Order_Grid  extends Mage_Adminhtml_Block_Sales_Order_Grid {

    protected function _initCollection() {
        $collection = Mage::getResourceModel('sales/order_grid_collection');
        $collection->getSelect()
            ->join(
                'customer_entity',
                'main_table.customer_id = customer_entity.entity_id',
                array('customer_name' => 'email')
            );
        return $collection;
    }

    protected  function _prepareCollection() {

        $collection = $this->_initCollection();

        $this->setCollection($collection);

        return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
    }

    protected function _prepareColumns() {

        $this->addColumn('email', array(
           'header' => Mage::helper('cls_custom')->__('Email Label'),
            'index' => 'customer_name',
            'type' => 'text',
            'filter' => false,
        ));

        $this->addExportType('*/*/test', Mage::helper('cls_custom')->__('Test'));

        return parent::_prepareColumns();
    }
}

