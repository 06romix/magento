<?php

/**
 * @author: Slava Rudawskyj (s.rudavskii@magneticone.com)
 * Date: 03.10.16 16:39
 */

class Plumrocket_FAQ_Model_Mysql4_Post_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
  public function _construct()
  {
    $this->_init('faq/post');
  }
}