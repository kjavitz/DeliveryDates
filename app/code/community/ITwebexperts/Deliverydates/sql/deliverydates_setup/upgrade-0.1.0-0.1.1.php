<?php
/** @var $this Mage_Core_Model_Resource_Setup */
$installer=$this;
$installer->startSetup();
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$setup->addAttribute('customer','delivery_date',array(
    'type'          =>  'datetime',
    'input'         =>  'date',
    'label'         =>  'Delivery Date',
    'global'        =>  1,
    'visible'       =>  1,
    'required'      =>  0,
    'user_defined'  =>  0,
    'visible_on_front'  =>  0,
    'sort_order'        =>  110,
    'source'    =>  'deliverydates/source_deliveryzone'
));

$oAttribute = Mage::getSingleton('eav/config')->getAttribute('customer', 'delivery_date');
$oAttribute->setData('used_in_forms', array('adminhtml_customer'));
$oAttribute->save();

$installer->endSetup();