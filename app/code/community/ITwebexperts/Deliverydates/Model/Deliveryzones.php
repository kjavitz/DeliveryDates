<?php
class ITwebexperts_Deliverydates_Model_Deliveryzones extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('deliverydates/deliveryzones');
    }

    public function getDisabledDaysOptions(){
        $disableddays = array(
            array('value'=>1,'label'=>Mage::helper('deliverydates')->__('Monday')),
            array('value'=>2,'label'=>Mage::helper('deliverydates')->__('Tuesday')),
            array('value'=>3,'label'=>Mage::helper('deliverydates')->__('Wednesday')),
            array('value'=>4,'label'=>Mage::helper('deliverydates')->__('Thursday')),
            array('value'=>5,'label'=>Mage::helper('deliverydates')->__('Friday')),
            array('value'=>6,'label'=>Mage::helper('deliverydates')->__('Saturday')),
            array('value'=>7,'label'=>Mage::helper('deliverydates')->__('Sunday')),
        );
        return $disableddays;
    }
}