<?php

/**
 * @author: Rudawskyj
 * Date: 10.10.16 15:23
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

    $this->addColumn('post_id', [
      'header' => $helper->__('ID #'),
      'index'  => 'post_id',
      'width'  => 50,
    ]);

    $this->addColumn('title', [
      'header' => $helper->__('Title'),
      'type'   => 'string',
      'index'  => 'title',
      'width'  => '25%',
    ]);

    $this->addColumn('status', [
      'header' => $helper->__('Status'),
      'type'   => 'select',
      'index'  => 'status',
      'options'=> $helper->getPostStatusOptions(),
      'width'  => '80px',
    ]);

    $this->addColumn('content', [
      'header' => $helper->__('Content'),
      'type'   => 'text',
      'index'  => 'content',
    ]);

    return parent::_prepareColumns();
  }

  public function getRowUrl($row)
  {
    return $this->getUrl('*/*/edit',['id' => $row->getId()]);
  }
}