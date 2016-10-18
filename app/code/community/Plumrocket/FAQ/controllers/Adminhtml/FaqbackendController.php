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

class Plumrocket_FAQ_Adminhtml_FaqbackendController extends Mage_Adminhtml_Controller_Action
{

  /**
   * Show post grid
   */
  public function indexAction()
  {
    $this->_initAction();
    $this->_title($this->__("Plumrocket Manage FAQ"));

    $this->renderLayout();
  }

  /**
   * Redirect to editAction() without param ID
   */
  public function newAction()
  {
    $this->_forward('edit');
  }

  /**
   * Action for create/edit post (check by ID)
   */
  public function editAction()
  {
    // Get id if available
    $id  = $this->getRequest()->getParam('id');
    /**
     * @var $model Plumrocket_FAQ_Model_Post
     */
    $model = Mage::getModel('psfaq/post');

    /**
     * @var $session Mage_Adminhtml_Model_Session
     */
    $session = Mage::getSingleton('adminhtml/session');

    if ($id) {
      // Load record
      $model->load($id);

      // Check if record is loaded
      if (!$model->getId()) {
        $session->addError($this->__('This Post no longer exists.'));
        $this->_redirect('*/*/');

        return;
      }
    }

    $this->_title($model->getId() ? $model->getData('title') : $this->__('New Post'));

    $data = $session->getData('post');
    if (!empty($data)) {
      $model->setData($data);
    }

    Mage::register('psfaq_post', $model);

    $this->_initAction();
    $this->_addBreadcrumb(
      $id ? $this->__('Edit Post') : $this->__('New Post'),
      $id ? $this->__('Edit Post') : $this->__('New Post')
    );

    $this->renderLayout();
  }

  /**
   * Try save post to database
   */
  public function saveAction()
  {
    /**
     * @var $session Mage_Adminhtml_Model_Session
     */
    $session = Mage::getSingleton('adminhtml/session');

    if ($postData = $this->getRequest()->getPost()) {
      $model = Mage::getSingleton('psfaq/post');
      $model->setData($postData);

      try {
        $model->save();

        $session->addSuccess($this->__('The Post has been saved.'));
        $this->_redirect('*/*/');
        return;
      } catch (Mage_Core_Exception $e) {
        $session->addError($e->getMessage());
      } catch (Exception $e) {
        $session->addError($this->__('An error occurred while saving this post.'));
      }

      $session->setData('post', $postData);
      $this->_redirectReferer();
    }
  }

  /**
   * Delete post by ID
   */
  public function deleteAction()
  {
    /**
     * @var $session Mage_Adminhtml_Model_Session
     */
    $session = Mage::getSingleton('adminhtml/session');

    $postId = (int)$this->getRequest()->getParam('id');
    if ($postId) {
      $model = Mage::getModel('psfaq/post');
      if ($model->load($postId)->getId()) {
        $model->delete();
        $session->addSuccess($this->__('The Post ID [ ' . $postId . ' ] deleted.'));
      } else {
        $session->addError($this->__('The Post ID [ ' . $postId . ' ] don\'t isset.'));
      }
    }

    $this->_redirect('*/*/');
  }

  /**
   * Delete post(s) by IDS
   */
  public function massDeleteAction()
  {
    /**
     * @var $session Mage_Adminhtml_Model_Session
     */
    $session = Mage::getSingleton('adminhtml/session');

    $postIds = (array)$this->getRequest()->getParam('post');
    foreach ($postIds as $postId) {
      if ($postId) {
        $model = Mage::getModel('psfaq/post');
        if ($model->load($postId)->getId()) {
          $model->delete();
          $session->addSuccess($this->__('The Post ID [ ' . $postId . ' ] deleted.'));
        } else {
          $session->addError($this->__('The Post ID [ ' . $postId . ' ] don\'t isset.'));
        }
      }
    }

    $this->_redirect('*/*/');
  }

  /**
   * Update post(s) status action
   *
   */
  public function massStatusAction()
  {
    $postIds = (array)$this->getRequest()->getParam('post');
    $status  = (string)$this->getRequest()->getParam('status');

    try {
      /**
       * @var $post Plumrocket_FAQ_Model_Post
       */
      $post = Mage::getSingleton('psfaq/post');
      $post->updateStatus($postIds, $status);

      $this->_getSession()->addSuccess(
        $this->__('Total of %d record(s) have been updated.', count($postIds))
      );
    } catch (Mage_Core_Exception $e) {
      $this->_getSession()->addError($e->getMessage());
    } catch (Exception $e) {
      $this->_getSession()
        ->addException($e, $this->__('An error occurred while updating the post(s) status.'));
    }

    $this->_redirect('*/*/');
  }

  /**
   * Initialize action
   *
   * Set active menu
   *
   * @return Mage_Adminhtml_Controller_Action
   */
  protected function _initAction()
  {
    $this->loadLayout()->_setActiveMenu('plumrocket/faq/manage_faq');
    $this->_initLayoutMessages('adminhtml/session');

    return $this;
  }
}