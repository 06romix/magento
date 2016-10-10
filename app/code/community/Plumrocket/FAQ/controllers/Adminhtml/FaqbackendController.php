<?php
class Plumrocket_FAQ_Adminhtml_FaqbackendController extends Mage_Adminhtml_Controller_Action
{

  public function indexAction()
  {
    $this->_title($this->__("Plumrocket Manage FAQ"));
    $this->loadLayout();
    $this->_addContent($this->getLayout()->createBlock('psfaq/adminhtml_post'));

    $this->renderLayout();
  }

  public function newAction()
  {
    $this->_forward('edit');
  }

  public function editAction()
  {
    $this->_initAction();
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

    Mage::register('psfaq', $model);

    $this->_initAction()
      ->_addBreadcrumb($id ? $this->__('Edit Post') : $this->__('New Post'), $id ? $this->__('Edit Post') : $this->__('New Post'))
      ->_addContent($this->getLayout()->createBlock('psfaq/adminhtml_post_edit')->setData('action', $this->getUrl('*/*/save')))
      ->renderLayout();
  }

  public function saveAction()
  {
    if ($postData = $this->getRequest()->getPost()) {
      $model = Mage::getSingleton('psfaq/post');
      $model->setData($postData);

      try {
        $model->save();

        Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The post has been saved.'));
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

  public function messageAction()
  {
    $data = Mage::getModel('psfaq/post')->load($this->getRequest()->getParam('id'));
    echo $data->getContent();
  }

  /**
   * Initialize action
   *
   * Here, we set the breadcrumbs and the active menu
   *
   * @return Mage_Adminhtml_Controller_Action
   */
  protected function _initAction()
  {
    $this->loadLayout()
      ->_setActiveMenu('plumrocket/faq/manage_faq');

    return $this;
  }
}