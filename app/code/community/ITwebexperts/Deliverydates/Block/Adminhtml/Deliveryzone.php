<?php
class ITwebexperts_Deliverydates_Block_Adminhtml_Deliveryzone extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_deliveryzones';
        $this->_blockGroup = 'deliverydates';
        $this->_headerText = Mage::helper('deliverydates')->__('Delivery Zone Records');
        parent::__construct();
    }


}