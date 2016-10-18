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

$installer = $this;
/**
 * @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup
 */
$installer->startSetup();

//$installer->getConnection()->dropTable($installer->getTable('psfaq/post'));
$table = $installer->getConnection()
  ->newTable($installer->getTable('psfaq/post'))
  ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
    'identity'  => true,
    'unsigned'  => true,
    'nullable'  => false,
    'primary'   => true,
  ), 'Id')
  ->addColumn('title', Varien_Db_Ddl_Table::TYPE_CHAR, 90, array(
    'nullable'  => false,
  ), 'Title')
  ->addColumn('status', Varien_Db_Ddl_Table::TYPE_CHAR, 20, array(
    'nullable'  => false,
    'default'   => 'Disabled',
  ), 'Status')
  ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    'nullable'  => false,
  ), 'Content');
$installer->getConnection()->createTable($table);

$installer->endSetup();