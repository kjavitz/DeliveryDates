<?php
class ITwebexperts_Deliverydates_Model_Mysql4_Deliveryzones extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('deliverydates/deliveryzones','zone_id');
    }
}