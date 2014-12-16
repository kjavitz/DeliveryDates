<?php
class ITwebexperts_Deliverydates_Model_Source_Deliveryzone extends Mage_Eav_Model_Entity_Attribute
{
    public function getAllOptions()
    {
        $zones = Mage::getModel('deliverydates/deliveryzones')->getCollection();
        $optionsarray = array(
            'value' =>  '',
            'label' =>  ''
        );
        foreach($zones as $zone){
            $optionsarray[] = array(
                'value' =>  $zone->getZoneId(),
                'label' =>  $zone->getName()
            );
        }
        return $optionsarray;
    }
}