<?php
class Plumrocket_FAQ_Adminhtml_FaqbackendController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction()
  {
    $this->loadLayout();
    $this->_title($this->__("Plumrocket Manage FAQ"));
    $this->renderLayout();
  }
}