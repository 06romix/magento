<?php
/**
 * @author: Rudawskyj
 * Date: 10.10.16 15:15
 */

class Plumrocket_FAQ_Block_Adminhtml_Post extends Mage_Adminhtml_Block_Widget_Grid_Container
{

  /**
   * Plumrocket_FAQ_Block_Adminhtml_Post constructor.
   *
   * Create grid (_blockGroup/_controller . _grid)
   */
  public function __construct()
  {
    $this->_blockGroup = 'psfaq';
    $this->_controller = 'adminhtml_post';
    $this->_headerText = Mage::helper('psfaq')->__('Plumrocket FAQ');

    parent::__construct();
    $this->_removeButton('filter');
  }
}