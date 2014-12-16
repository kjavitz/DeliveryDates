<?php
/** @var $this Mage_Core_Model_Resource_Setup */
$installer=$this;
$installer->startSetup();
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$table = $installer->getConnection()->newTable($installer->getTable('deliverydates/zones'))
    ->addColumn('zone_id',Varien_Db_Ddl_Table::TYPE_INTEGER,null,array(
        'unsigned'  =>  true,
        'nullable'  =>  false,
        'primary'   =>  true,
        'identity'  =>  true,
    ),'zone id')
    ->addColumn('name',Varien_Db_Ddl_Table::TYPE_TEXT,null,array(),'Zone Name')
    ->addColumn('disabled_days',Varien_Db_Ddl_Table::TYPE_TEXT)
    ->addColumn('disabled_dates',Varien_Db_Ddl_Table::TYPE_TEXT);

$setup->addAttribute('customer','delivery_zone',array(
    'type'          =>  'int',
    'input'         =>  'select',
    'label'         =>  'Delivery Zone',
    'global'        =>  1,
    'visible'       =>  1,
    'required'      =>  0,
    'user_defined'  =>  0,
    'visible_on_front'  =>  0,
    'source'    =>  'deliverydates/source/deliveryzone'
));