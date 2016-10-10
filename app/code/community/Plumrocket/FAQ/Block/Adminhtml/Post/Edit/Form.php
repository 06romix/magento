<?php
/**
 * @author: Rudawskyj
 * Date: 10.10.16 16:53
 */

class Plumrocket_FAQ_Block_Adminhtml_Post_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
  /**
   * Init class
   */
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
    $model = Mage::registry('psfaq');

    $form = new Varien_Data_Form([
      'id'        => 'edit_form',
      'action'    => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
      'method'    => 'post',
    ]);

    $fieldset = $form->addFieldset('base_fieldset', [
      'legend'    => Mage::helper('checkout')->__('Post Information'),
      'class'     => 'fieldset-wide',
    ]);

    if ($model->getId()) {
      $fieldset->addField('id', 'hidden', [
        'name' => 'id',
      ]);
    }

    $fieldset->addField('title', 'text', [
      'name'      => 'title',
      'label'     => Mage::helper('psfaq')->__('Title'),
      'title'     => Mage::helper('psfaq')->__('Title'),
      'required'  => true,
    ]);

    $fieldset->addField('content', 'textarea', [
      'name'      => 'content',
      'label'     => Mage::helper('psfaq')->__('Content'),
      'title'     => Mage::helper('psfaq')->__('Content'),
      'required'  => true,
    ]);

    $form->setValues($model->getData());
    $form->setUseContainer(true);
    $this->setForm($form);

    return parent::_prepareForm();
  }
}