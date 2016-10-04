<?php
class Plumrocket_FAQ_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction()
    {
      $this->loadLayout();
      $this->getLayout()->getBlock("head")->setTitle($this->__("Titlename"));

      $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb(
        "home",
        [
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		    ]
      );

      $breadcrumbs->addCrumb(
        "titlename",
        [
                "label" => $this->__("Titlename"),
                "title" => $this->__("Titlename")
		    ]
      );

      $this->renderLayout();
    }
}