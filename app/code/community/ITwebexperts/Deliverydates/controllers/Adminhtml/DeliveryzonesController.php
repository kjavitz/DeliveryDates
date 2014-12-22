<?php
class ITwebexperts_Deliverydates_Adminhtml_DeliveryzonesController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id',null);
        $tableItem = Mage::getModel('deliverydates/deliveryzones');

        if($id){
            $tableItem->load((int) $id);
            if($tableItem->getId()){
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if($data){
                    $tableItem->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('deliverydates')->__('The Record does not exist.'));
                $this->_redirect('*/*/');
            }
        }
        Mage::register('form_data',$tableItem);

        $this->loadLayout()->renderLayout();
    }

    public function saveAction()
    {
        if($this->getRequest()->getPost())
        {
            try {
                $data = $this->getRequest()->getPost();
                $id = $this->getRequest()->getParam('id');
                if($data){
                    $tableItem = Mage::getModel('deliverydates/deliveryzones')->load($id);
                    $data['disabled_days'] = implode(',',$data['disabled_days']);
                    $tableItem->setData($data);
                    if($id){
                        $tableItem->setId($id);
                    }
                    $tableItem->save();
                    Mage::getSingleton('adminhtml/session')->addSuccess('Record Saved');
                    Mage::getSingleton('adminhtml/session')->setFormData(false);
                    $this->_redirect('*/*/index',array('id'=>$id));
                }
            } catch (Exception $e){
                $this->_getSession()->addError(
                    Mage::helper('deliverydates')->__('An error occurred while saving the record. Please review the log and try again'));
                Mage::logException($e);
                $this->_redirect('*/*/edit',array('id'=>$id));
                return $this;
            }
        }
    }

    public function deleteAction(){
        $id = $this->getRequest()->getParam('id');
        if($id !=0 || $id != null){
            Mage::getModel('deliverydates/deliveryzones')->load($id)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('deliverydates')->__('The record has been deleted'));
            $this->_redirect('*/*/');
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('deliverydates')->__('The record does not exist.'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }
}