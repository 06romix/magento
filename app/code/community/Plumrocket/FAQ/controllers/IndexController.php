<?php
class Plumrocket_FAQ_IndexController extends Mage_Core_Controller_Front_Action
{
    public function IndexAction()
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

      /**
       * @var $collection Plumrocket_FAQ_Model_Mysql4_Post_Collection
       */
      $collection = Mage::getModel('psfaq/post')->getCollection();
      $collection->setOrder('post_id', 'DESC');

      Mage::getSingleton('psfaq/post')->setData('collection', $collection->getData());
      $this->renderLayout();
    }



    public function ViewAction()
    {
      $this->loadLayout();

      preg_match('/\/(\d+)\/$/', $this->getRequest()->getRequestString(), $argv);

      if (isset($argv[1]) && is_numeric($argv[1])) {
        $model = Mage::getModel('psfaq/post');
        Mage::getSingleton('psfaq/post')->setData('post', $model->load($argv[1])->getData());
      }

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
        'titleName',
        [
          'label' => $this->__('FAQ'),
          'title' => $this->__('FAQ'),
          'link'  => Mage::getUrl('psfaq/'),
        ]
      );
      $breadcrumbs->addCrumb(
        'view',
        [
          'label' => $this->__('view'),
          'title' => $this->__('view'),
        ]
      );

      $this->renderLayout();
    }
}