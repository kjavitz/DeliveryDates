<?php
class ITwebexperts_Deliverydates_Block_Customer_Rentalqueue_Calendar extends Mage_Core_Block_Template
{



    protected function _construct()
    {
        $this->customerid = Mage::getSingleton('customer/session')->getId();
        $this->enabled = Mage::getStoreConfig('payperrentals/rental/enable_deliverydates');
        $this->deliverymin = Mage::getStoreConfig('payperrentals/rental/deliverydates_min');
        $this->numberinqueue = Mage::getModel('payperrentals/rentalqueue')->getCollection()->getNumberInQueue($this->customerid);
        $this->customer = Mage::getSingleton('customer/session')->getCustomer();
        if($this->customer->getDeliveryDate()){
        $this->deliverydate = Mage::helper('payperrentals/date')->formatDbDate($this->customer->getDeliveryDate());}
        else {$this->deliverydate = '';}
        $this->mindate = Mage::getStoreConfig('payperrentals/rental/daysmin');
        $this->maxdate = Mage::getStoreConfig('payperrentals/rental/daysmax');
    }

    public function getCalendar(){
        if($this->customer->getDeliveryZone() == '' || $this->customer->getDeliveryZone() == null){
            return $this->__('Thank you for signing up. Within 24 hours we will assign you to a delivery zone so you can pick your delivery date.');
        } else if($this->numberinqueue >= $this->deliverymin){
            $this->oktoshow = true;
        }
        else {
            return $this->__('Please add at least %d items to queue to choose delivery date',$this->deliverymin);
        }
    }

}