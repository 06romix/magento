<?php
class Plumrocket_FAQ_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {
      $this->loadLayout();
      $this->getLayout()->getBlock("head")->setTitle($this->__("FAQ"));

      /**
       * @var $breadcrumbs Mage_Page_Block_Html_Breadcrumbs
       */
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
                "label" => $this->__("FAQ"),
                "title" => $this->__("FAQ")
		    ]
      );

      $this->renderLayout();
    }

    public function ViewAction()
    {
      $this->loadLayout();
      $this->getLayout()->getBlock("head")->setTitle($this->__("FAQ"));

      /**
       * @var $breadcrumbs Mage_Page_Block_Html_Breadcrumbs
       */
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
          "label" => $this->__("FAQ"),
          "title" => $this->__("FAQ")
        ]
      );

      $this->renderLayout();
    }
}