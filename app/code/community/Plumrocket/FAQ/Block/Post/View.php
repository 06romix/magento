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

class Plumrocket_FAQ_Block_Post_View extends Mage_Core_Block_Template
{
  public function getPost()
  {
    return Mage::registry('psfaq_post');
  }

  /**
   * Prepare Content HTML
   *
   * @return string
   */
  public function getContent()
  {
    $block = Mage::registry('psfaq_post');

    /* @var $helper Plumrocket_FAQ_Helper_Data */
    $helper = Mage::helper('psfaq');
    $processor = $helper->getBlockTemplateProcessor();
    return $processor->filter($block->getContent());
  }
}