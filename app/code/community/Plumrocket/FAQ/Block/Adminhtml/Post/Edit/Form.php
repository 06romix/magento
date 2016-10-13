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

class Plumrocket_FAQ_Block_Adminhtml_Post_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

  public function __construct()
  {
    parent::__construct();

    $this->setId('psfaq_post_form');
  }

  /**
   * Setup form fields for inserts/updates
   *
   * return Mage_Adminhtml_Block_Widget_Form
   */
  protected function _prepareForm()
  {
    $model = Mage::registry('psfaq_post');
    Mage::unregister('psfaq_post');

    /**
     * @var $helper Plumrocket_FAQ_Helper_Data
     */
    $helper = Mage::helper('psfaq');

    $form = new Varien_Data_Form(array(
      'id'        => 'edit_form',
      'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
      'method'    => 'post',
    ));

    $fieldSet = $form->addFieldset('base_fieldset', array(
      'legend'    => Mage::helper('checkout')->__('Post Information'),
      'class'     => 'fieldset-wide',
    ));

    if ($model->getId()) {
      $fieldSet->addField('post_id', 'hidden', array(
        'name' => 'post_id',
      ));
    }

    $fieldSet->addField('title', 'text', array(
      'name'      => 'title',
      'label'     => $helper->__('Title'),
      'title'     => $helper->__('Title'),
      'required'  => true,
    ));

    $fieldSet->addField('status', 'select', array(
      'name'      => 'status',
      'label'     => $helper->__('Status'),
      'title'     => $helper->__('Status'),
      'options'   => $helper->getPostStatusOptions(),
    ));

    $fieldSet->addField('content', 'editor', array(
      'name'      => 'content',
      'label'     => $helper->__('Content'),
      'title'     => $helper->__('Content'),
      'required'  => true,
      'wysiwyg'   => true,
      'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
    ));

    $form->setValues($model->getData());
    $form->setUseContainer(true);
    $this->setForm($form);

    return parent::_prepareForm();
  }

  /**
   * Need for working wysiwyg editor
   */
  protected function _prepareLayout()
  {
    parent::_prepareLayout();
    if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
      $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
    }
  }
}