<?php
class ITwebexperts_Deliverydates_Block_Adminhtml_Deliveryzones_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('zoneGrid');
        $this->setDefaultSort('title');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        /** @var $_collection ITwebexperts_Deliverydates_Model_Mysql4_Deliveryzones_Collection */
        $_collection = Mage::getModel('deliverydates/deliveryzones')->getCollection();
        $this->setCollection($_collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name',array(
            'header'    =>  Mage::helper('deliverydates')->__('Zone Name'),
            'index'     =>  'zone_id',
            'type'      =>  'text',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit',array(
            'id'    =>  $row->getId()));
    }
}