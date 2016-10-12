<?php
class Plumrocket_FAQ_IndexController extends Mage_Core_Controller_Front_Action
{

  /**
   * Show list of active post
   */
  public function indexAction()
  {
    $this->_initAction();
    $this->renderLayout();
  }

  /**
   * Show post by id
   *
   * If post empty or don't exists - show 404 page from CMS_INDEX_NoROUTE
   *
   * @return bool
   */
  public function viewAction()
  {
    $model = Mage::getModel('psfaq/post');
    $post_id = (int)$this->getRequest()->getParam('post');
    if ($model->load($post_id)->isEmpty()) {
      $this->_forward('cms_index_noroute');
      return false;
    }

    Mage::register('psfaq_post', $model);

    $this->_initAction();
    $this->renderLayout();
    return true;
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