<?php
class ITwebexperts_Deliverydates_Block_Customer_Rentalqueue_Calendar extends Mage_Core_Block_Template
{



    protected function _construct()
    {
        $this->customerid = Mage::getSingleton('customer/session')->getId();
        $this->enabled = Mage::getStoreConfig('payperrentals/rental/enable_deliverydates');
        $this->deliverymin = 0;// Mage::getStoreConfig('payperrentals/rental/deliverydates_min');
        $this->numberinqueue = Mage::getModel('payperrentals/rentalqueue')->getCollection()->getNumberInQueue($this->customerid);
    }

    public function getCalendar(){
        if($this->numberinqueue >= $this->deliverymin){
            $this->oktoshow = true;
        } else {
            return $this->__('Please add at least %d items to queue to choose delivery date',$this->deliverymin);
        }
    }

}