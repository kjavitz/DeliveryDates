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

    public function getGlobalDisabledDates(){
        $globaldatesConfig = unserialize(Mage::getStoreConfig('payperrentals/rental/global_dates_excluded'));
        $disableddates = array();
        foreach($globaldatesConfig as $globaldate){
            $startdate = new DateTime($globaldate['disabled_from']);
            $enddate = new DateTime($globaldate['disabled_to']);
            do{
                $disableddates[] = $startdate->format('Y-m-d');
            } while ($startdate->modify('+1 day') <= $enddate);
        }
        return json_encode($disableddates);
    }
}