<?php
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
    $model = Mage::getModel('psfaq/post');

    if ($id) {
      // Load record
      $model->load($id);

      // Check if record is loaded
      if (!$model->getId()) {
        Mage::getSingleton('adminhtml/session')->addError($this->__('This Post no longer exists.'));
        $this->_redirect('*/*/');

        return;
      }
    }

    $this->_title($model->getId() ? $model->getTitle() : $this->__('New Post'));

    $data = Mage::getSingleton('adminhtml/session')->getPostData(true);
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
    if ($postData = $this->getRequest()->getPost()) {
      $model = Mage::getSingleton('psfaq/post');
      $model->setData($postData);

      try {
        $model->save();

        Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The Post has been saved.'));
        $this->_redirect('*/*/');

        return;
      }
      catch (Mage_Core_Exception $e) {
        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
      }
      catch (Exception $e) {
        Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this post.'));
      }

      Mage::getSingleton('adminhtml/session')->setPostData($postData);
      $this->_redirectReferer();
    }
  }

  /**
   * Delete post by ID
   */
  public function deleteAction()
  {
    $post_id = (int)$this->getRequest()->getParam('id');
    if ($post_id) {
      $model = Mage::getModel('psfaq/post');
      if (!$model->load($post_id)->isEmpty()) {
        $model->delete();
        Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The Post ID[' . $post_id .'] deleted.'));
        $this->_redirect('*/*/');
        return;
      }
    }

    Mage::getSingleton('adminhtml/session')->addError($this->__('The Post ID[' . $post_id .'] don\'t isset.'));
    $this->_redirect('*/*/');
    return;
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