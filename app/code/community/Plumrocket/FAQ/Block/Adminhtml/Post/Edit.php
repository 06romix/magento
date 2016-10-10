<?php
/**
 * @author: Rudawskyj
 * Date: 10.10.16 16:58
 */

class Plumrocket_FAQ_Block_Adminhtml_Post_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
  /**
   * Init class
   */
  public function __construct()
  {
    $this->_blockGroup = 'psfaq';
    $this->_controller = 'adminhtml_post';

    parent::__construct();

    $this->_updateButton('save', 'label', $this->__('Save Post'));
    $this->_updateButton('delete', 'label', $this->__('Delete post'));
  }

  /**
   * Get Header text
   *
   * @return string
   */
  public function getHeaderText()
  {
    if (Mage::registry('psfaq')->getId()) {
      return $this->__('Edit Post');
    }
    else {
      return $this->__('New Post');
    }
  }
}