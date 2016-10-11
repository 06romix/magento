<?php

/**
 * @author: Rudawskyj
 * Date: 11.10.16 16:01
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