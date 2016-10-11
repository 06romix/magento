<?php
class Plumrocket_FAQ_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
    {
      $this->_initAction();
      $this->renderLayout();
    }

    public function ViewAction()
    {
      $this->_initAction();
      $this->renderLayout();
    }

    protected function _initAction()
    {
      $this->loadLayout();
      /**
       * @var $head Mage_Page_Block_Html_Head
       */
      $head = $this->getLayout()->getBlock('head');
      $head->setTitle($this->__('FAQ'));

      /**
       * @var $breadcrumbs Mage_Page_Block_Html_Breadcrumbs
       */
      $breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');

      $breadcrumbs->addCrumb(
        'home',
        [
          'label' => $this->__('Home Page'),
          'title' => $this->__('Home Page'),
          'link'  => Mage::getBaseUrl(),
        ]
      );

      $breadcrumbs->addCrumb(
        'titleName',                            // class
        [
          'label' => $this->__('FAQ'),          // >text<
          'title' => $this->__('FAQ'),          // <a title="">
          'link'  => Mage::getUrl('psfaq/'),    // <a href="">
        ]
      );

      $post_id = (int)$this->getRequest()->getParam('post');
      if ($post_id) {
        $breadcrumbs->addCrumb(
          'view',
          [
            'label' => $this->__('view'),
            'title' => $this->__('view'),
          ]
        );
      }
    }
}