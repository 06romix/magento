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

class Plumrocket_FAQ_Block_Post_Index extends Mage_Core_Block_Template
{

  public function getPostCollection()
  {
    /**
     * @var $collection Plumrocket_FAQ_Model_Mysql4_Post_Collection
     */
    $collection = Mage::getModel('psfaq/post')->getCollection();
    $collection->addFilter('status', 1);
    $collection->setOrder('post_id', 'DESC');

    return $collection->getData();
  }
}