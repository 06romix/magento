<?php
/**
 * @author: Slava Rudawskyj (s.rudavskii@magneticone.com)
 * Date: 03.10.16 16:34
 */

class Plumrocket_FAQ_Model_Mysql4_Post extends Mage_Core_Model_Mysql4_Abstract
{
  protected function _construct()
  {
    $this->_init('faq/post', 'post_id');
  }
}