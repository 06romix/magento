<?php

/**
 * @author: Slava Rudawskyj (s.rudavskii@magneticone.com)
 * Date: 03.10.16 17:34
 */

$installer = $this;
/**
 * @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup
 */
$installer->startSetup();

$installer->getConnection()->dropTable($installer->getTable('faq/post'));
$table = $installer->getConnection()
  ->newTable($installer->getTable('faq/post'))
  ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
    'identity'  => true,
    'unsigned'  => true,
    'nullable'  => false,
    'primary'   => true,
  ), 'Id')
  ->addColumn('title', Varien_Db_Ddl_Table::TYPE_CHAR, 90, array(
    'nullable'  => false,
  ), 'Title')
  ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    'nullable'  => false,
  ), 'Content');
$installer->getConnection()->createTable($table);

$installer->endSetup();