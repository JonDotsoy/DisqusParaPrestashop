<?php 

/**
* 2014 jonad.in
* 
*  @author 		Jonathan Delgado Zamorano <jonad.correo@gmail.com>
*  @copyright 	2014 Jonad.in
*  @license 	http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/


if (!defined('_PS_VERSION_'))
	exit;

class productcommentsdisqus extends Module
{
	
	public function __construct()
	{
		$this->name = 'productcommentsdisqus';
		$this->tab = 'front_office_features';
		$this->version = '1.2';
		$this->author = 'Jonad.in';
		$this->need_instance = 0;
		$this->module_key = 'f74f3af6654eb340cad0fa8b7d73412f';
		$this->secure_key = Tools::encrypt($this->name);
		
		parent::__construct();

		$this->displayName = $this->l('Comment from disqus');
		$this->description = $this->l('comment on this product from disqus.');
	}

	public function install()
	{
		if (parent::install() == false
			|| !Configuration::updateValue('DISQUS_SHORTNAME_PRODUCT', 'example')
			|| !$this->registerHook('productTab')
			|| !$this->registerHook('extraProductComparison')
			|| !$this->registerHook('productOutOfStock')
			|| !$this->registerHook('productTabContent')
			|| !$this->registerHook('header')
			)
			return false;
		return true;
	}

	public function uninstall()
	{
		if (parent::uninstall() == false
			|| !Configuration::deleteByName('DISQUS_SHORTNAME_PRODUCT')
			|| !$this->unregisterHook('productTab')
			|| !$this->unregisterHook('extraProductComparison')
			|| !$this->unregisterHook('productOutOfStock')
			|| !$this->unregisterHook('productTabContent')
			|| !$this->unregisterHook('header')
			)
				return false;
		return true;
	}

	public function getContent()
	{
		if (Tools::isSubmit('submitCross')) {
			Configuration::updateValue('DISQUS_SHORTNAME_PRODUCT', Tools::getValue('shortname'));
		}

		$this->context->smarty->assign(array(
			'shortname_product' => Configuration::get('DISQUS_SHORTNAME_PRODUCT'),
			'action_form' => Tools::safeOutput($_SERVER['REQUEST_URI']),
			'localPath' => $this->_path
			));
		return $this->display(__FILE__, '/configuration.tpl');
	}

	public function hookProductTabContent($params)
	{
		$this->context->smarty->assign(array(
			'shortname_product' => Configuration::get('DISQUS_SHORTNAME_PRODUCT')
			));
		return $this->display(__FILE__, '/productcomments.tpl');
	}

	public function hookProductTab($params)
	{
		$this->context->smarty->assign(array(
			'shortname_product' => Configuration::get('DISQUS_SHORTNAME_PRODUCT')
			));
		return $this->display(__FILE__, '/tab.tpl');
	}
}