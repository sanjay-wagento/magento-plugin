<?php
/**
 * @license Copyright 2011-2014 BitPay Inc., MIT License
 * @see https://github.com/bitpay/magento-plugin/blob/master/LICENSE
 */

/**
 * @route bitpay/index/
 */
class Bitpay_Core_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * @route bitpay/index/index?quote=n
     */
    public function indexAction()
    {
        $paid   = false;
        $params = $this->getRequest()->getParams();

        if (true === isset($params['paid'])) {
            \Mage::helper('bitpay')->registerAutoloader();
            \Mage::helper('bitpay')->debugData($params);
        } else {
            \Mage::helper('bitpay')->debugData('[ERROR] In Bitpay_Core_IndexController::indexAction(), Could not get parameters from HTTP request.');
        }

        $this->loadLayout();

        $this->getResponse()->setHeader('Content-type', 'application/json');
        
        // ?
        $this->getResponse()->setBody(json_encode(array('paid' => $paid)));
    }
}
