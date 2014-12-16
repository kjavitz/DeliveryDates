<?php
class ITwebexperts_Deliverydates_Block_Adminhtml_Deliveryzones_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'deliverydates';
        $this->_controller = 'adminhtml_deliveryzones';
        $this->_mode = 'edit';
        $this->_updateButton('save', 'label', Mage::helper('maintenance')->__('Save Record'));
        $this->_updateButton('delete', 'label', Mage::helper('maintenance')->__('Delete Record'));
    }

    public function getHeaderText(){
        return Mage::helper('deliverydates')->__('Editing Record');
    }
}