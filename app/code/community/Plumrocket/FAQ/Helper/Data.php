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

class Plumrocket_FAQ_Helper_Data extends Mage_Admin_Helper_Data
{
  public function moduleEnabled()
  {
    return (bool)Mage::getStoreConfig('psfaq/general/enable');
  }

  public function getPostStatusOptions()
  {
    return array(
      0 => $this->__('Disabled'),
      1 => $this->__('Enabled'),
    );
  }

  const XML_NODE_BLOCK_TEMPLATE_FILTER    = 'global/cms/block/tempate_filter';

  /**
   * Retrieve Template processor for Block Content
   *
   * @return Varien_Filter_Template
   */
  public function getBlockTemplateProcessor()
  {
    $model = (string)Mage::getConfig()->getNode(self::XML_NODE_BLOCK_TEMPLATE_FILTER);
    return Mage::getModel($model);
  }
}