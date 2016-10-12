<?php

/**
 * @author: Rudawskyj
 * Date: 11.10.16 17:18
 */

class Plumrocket_FAQ_Block_Post_View extends Mage_Core_Block_Template
{

  public function getPost()
  {
    $data = Mage::registry('psfaq_post')->getData();
    Mage::unregister('psfaq_post');

    return $data;
  }
}