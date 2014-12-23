<?php
class ITwebexperts_Deliverydates_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getDisabledDays($customerid){
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        $deliveryzone = $customer->getDeliveryZone();
        $disableddays = Mage::getModel('deliverydates/deliveryzones')->load($deliveryzone)->getDisabledDays();
        $disableddays = array_map('intval',explode(',',$disableddays));
        return json_encode($disableddays);
    }
}