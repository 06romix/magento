<?php
/**
 * Plumrocket Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the End-user License Agreement
 * that is available through the world-wide-web at this URL:
 * http://wiki.plumrocket.net/wiki/EULA
 * If you are unable to obtain it through the world-wide-web, please
 * send an email to support@plumrocket.com so we can send you a copy immediately.
 *
 * @package     Plumrocket_SocialLogin
 * @copyright   Copyright (c) 2014 Plumrocket Inc. (http://www.plumrocket.com)
 * @license     http://wiki.plumrocket.net/wiki/EULA  End-user License Agreement
 */

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
   * If post empty or disabled - show 404 page from CMS_INDEX_NOROUTE
   */
  public function viewAction()
  {
    $model = Mage::getModel('psfaq/post');
    $post_id = (int)$this->getRequest()->getParam('post');

    if ($model->load($post_id)->isEmpty() || !$model->getData('status')) {
      $this->_forward('cms_index_noroute');
      return;
    }

    Mage::register('psfaq_post', $model);

    $this->_initAction();
    $this->renderLayout();
  }

  protected function _initAction()
  {
    /**
     * @var $helper Plumrocket_FAQ_Helper_Data
     */
    $helper = Mage::helper('psfaq');
    // 404 if module disabled
    if (!$helper->moduleEnabled()) {
      $this->_forward('cms_index_noroute');
      return;
    }

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
      array(
        'label' => $this->__('Home Page'),
        'title' => $this->__('Home Page'),
        'link'  => Mage::getBaseUrl(),
      )
    );

    $breadcrumbs->addCrumb(
      'titleName',                            // class
      array(
        'label' => $this->__('FAQ'),          // >text<
        'title' => $this->__('FAQ'),          // <a title="">
        'link'  => Mage::getUrl('psfaq/'),    // <a href="">
      )
    );

    $post_id = (int)$this->getRequest()->getParam('post');
    if ($post_id) {
      $breadcrumbs->addCrumb(
        'view',
        array(
          'label' => $this->__('view'),
          'title' => $this->__('view'),
        )
      );
    }
  }
}