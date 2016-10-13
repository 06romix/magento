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