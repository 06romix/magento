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

class Plumrocket_FAQ_Block_System_Config_Version extends Mage_Adminhtml_Block_System_Config_Form_Field
{
  public function render(Varien_Data_Form_Element_Abstract $element)
  {
    $m = Mage::getConfig()->getNode('modules/'.$this->getModuleName());
    $html = '<div style="padding:10px;background-color:#fff;border:1px solid #ddd;margin-bottom:7px;">'
          . $m->name . ' v' . $m->version . ' was developed by <a href="https://store.plumrocket.com" target="_blank">Plumrocket Inc</a>.'
//          . 'For manual & video tutorials please refer to <a href="' . $m->wiki . '" target="_blank">our online documentation<a/>.'
          . '</div>';
    return $html;
  }
}