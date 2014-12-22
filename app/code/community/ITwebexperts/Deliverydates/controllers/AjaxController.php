<?php
class ITwebexperts_Deliverydates_AjaxController extends Mage_Core_Controller_Front_Action
{

    /**
     * Updates customer delivery date from rental queue page
     */
    public function updateDeliveryDateAction(){
        $date = $this->getRequest()->getParam('calendarpick');
        $date = strtotime($date);
        $date = date('Y-m-d',$date);
        $customerid = $this->getRequest()->getParam('customerid');
        try {
            Mage::getModel('customer/customer')->load($customerid)->setDeliveryDate($date)->save();
            $response['response'] = 'success';

        } catch (Exception $e){
            $response['response'] = 'failure';
            $response['message'] = $e;
        }
        $this->getResponse()->setBody(Zend_Json::encode($response));
    }
}