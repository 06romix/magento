<?php
/**
 * @author: Slava Rudawskyj (s.rudavskii@magneticone.com)
 * Date: 03.10.16 17:32
 */

$installer = $this;

$connection = $installer->getConnection();

$installer->startSetup();

$installer->getConnection()
  ->addColumn($installer->getTable('plumrocket_faq/post'),
    'created_at',
    array(
      'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
      'nullable' => true,
      'default' => null,
      'comment' => 'Created At'
    )
  );

$installer->endSetup();