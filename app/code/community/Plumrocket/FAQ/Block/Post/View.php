<?php

/**
 * @author: Rudawskyj
 * Date: 11.10.16 17:18
 */

class Plumrocket_FAQ_Block_Post_View extends Mage_Core_Block_Template
{

  public function getPost()
  {
    $model = Mage::getModel('psfaq/post');
    $post_id = (int)$this->getRequest()->getParam('post');
    if ($post_id) {
      // load post by ID ()post_id
      $model->load($post_id);

      if ($model->isEmpty()) {

      } else {
        return $model->getData();
      }
    }

    return false;
  }
}