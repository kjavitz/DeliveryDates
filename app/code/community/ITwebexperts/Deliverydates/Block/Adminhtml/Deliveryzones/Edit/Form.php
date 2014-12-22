<?php
class ITwebexperts_Deliverydates_Block_Adminhtml_Deliveryzones_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm(){
        $data = null;
        $form = new Varien_Data_Form(array(
            'id'    =>  'edit_form',
            'action'    =>  $this->getUrl('*/*/save', array
            ('id'      =>  $this->getRequest()->getParam('id'))),
            'method'    =>  'post',
            'enctype'   =>  'multipart/form-data',
        ));
        $form->setUseContainer(true);
        $this->setForm($form);

        if (Mage::getSingleton('adminhtml/session')->getFormData())
        {
            $data = Mage::getSingleton('adminhtml/session')->getFormData();
            Mage::getSingleton('adminhtml/session')->setFormData(null);
        }  elseif(Mage::registry('form_data'))
            $data = Mage::registry('form_data')->getData();

        $fieldset = $form->addFieldset('registry_form',array('legend'=>Mage::helper('deliverydates')->__('Delivery Zone')));

        $fieldset->addField('name', 'text', array(
            'label'     =>  Mage::helper('deliverydates')->__('Zone Name'),
            'class'     =>  'required-entry',
            'required'  =>  'true',
            'name'      =>  'name'
        ));

        $fieldset->addField('disabled_days', 'multiselect', array(
            'label'     =>  Mage::helper('maintenance')->__('Disabled Days'),
            'name'      =>  'disabled_days',
            'class'     =>  'required-entry',
            'required'  =>  'true',
            'values'    =>  Mage::getModel('deliverydates/deliveryzones')->getDisabledDaysOptions()
        ));

        $form->setValues($data);
        return parent::_prepareForm();
    }

}