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

class Plumrocket_FAQ_Block_Adminhtml_Post_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
    parent::__construct();
    $this->setId('psfaq_grid');
    $this->setDefaultSort('post_id');
    $this->setDefaultDir('DESC');
    $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
    /**
     * @var $collection Plumrocket_FAQ_Model_Mysql4_Post_Collection
     */
    $collection = Mage::getResourceModel('psfaq/post_collection');
    $this->setCollection($collection);

    return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
    /**
     * @var $helper Plumrocket_FAQ_Helper_Data
     */
    $helper = Mage::helper('psfaq');

    $this->addColumn('post_id', array(
      'header' => $helper->__('ID #'),
      'index'  => 'post_id',
      'width'  => 50,
    ));

    $this->addColumn('title', array(
      'header' => $helper->__('Title'),
      'type'   => 'string',
      'index'  => 'title',
      'width'  => '25%',
    ));

    $this->addColumn('status', array(
      'header' => $helper->__('Status'),
      'type'   => 'select',
      'index'  => 'status',
      'options'=> $helper->getPostStatusOptions(),
      'width'  => '80px',
    ));

    $this->addColumn('content', array(
      'header' => $helper->__('Content'),
      'type'   => 'text',
      'index'  => 'content',
    ));

    return parent::_prepareColumns();
  }

  public function getRowUrl($row)
  {
    return $this->getUrl('*/*/edit',array('id' => $row->getId()));
  }
}