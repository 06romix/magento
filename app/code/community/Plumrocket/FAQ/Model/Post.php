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

class Plumrocket_FAQ_Model_Post extends Mage_Core_Model_Abstract
{
  public function _construct()
  {
    $this->_init('psfaq/post');
  }

  /**
   * @param array $postIds
   * @param string $status
   */
  public function updateStatus($postIds, $status)
  {
    foreach ($postIds as $postId) {
      $this->load($postId);
      if ($this->getId()) {
        $this->setData('status', $status);
        $this->save();
      }
    }
  }

  /**
   * return url for list of faq
   *
   * @return string
   */
  public function getFaqUrl()
  {
    return Mage::getUrl('psfaq/index/view/', array('post' => $this->getId()));
  }
}