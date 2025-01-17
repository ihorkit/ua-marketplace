<?php
/**
 * @package 	MrkvUAMmarketplaces
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\RozetkaCallbacks;

class Rozetka extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_rozetka;

	public $pages = array();

	public $subpages = array();

	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_rozetka = new RozetkaCallbacks();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addSubPages( $this->subpages )->register();
	}

	public function setSettings()
	{

			$args = array(
				array(
					'option_group'	=> 'mrkv_ua_rozetka_option_group',
					'option_name'	=> 'mrkv_uamrkpl_rozetka_shop_name',
					'callback'		=> array( $this->callbacks_rozetka, 'optionGroup' )
				),
				array(
					'option_group'	=> 'mrkv_ua_rozetka_option_group',
					'option_name'	=> 'mrkv_uamrkpl_rozetka_company',
					'callback'		=> array( $this->callbacks_rozetka, 'optionGroup' )
				),
				array(
					'option_group'	=> 'mrkv_ua_rozetka_option_group',
					'option_name'	=> 'mrkv_uamrkpl_rozetka_main_maker',
					'callback'		=> array( $this->callbacks_rozetka, 'optionGroup' )
				),
				array(
					'option_group'	=> 'mrkv_ua_rozetka_option_group',
					'option_name'	=> 'mrkv_uamrkpl_rozetka_brends',
					'callback'		=> array( $this->callbacks_rozetka, 'optionGroup' )
				)
			);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id'		=> 'mrkvuamp_rozetka_section',
				'title'		=> __( 'Rozetka Загальні Налаштування', 'mrkv-ua-marketplaces' ),
				'callback'	=> array( $this->callbacks_rozetka, 'settingsSection' ),
				'page'		=> 'mrkv_ua_marketplaces_rozetka'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id'		=> 'mrkv_uamrkpl_rozetka_shop_name',
				'title'		=> __( 'Назва магазину', 'mrkv-ua-marketplaces' ),
				'callback'	=> array( $this->callbacks_rozetka, 'shopName' ),
				'page'		=> 'mrkv_ua_marketplaces_rozetka',
				'section'	=> 'mrkvuamp_rozetka_section',
				'args'		=> array(
					'label_for' => 'mrkv_uamrkpl_rozetka_shop_name',
					'class'		=> 'mrkv_uamrkpl_class',
				)
			),
			array(
				'id'		=> 'mrkv_uamrkpl_rozetka_company',
				'title'		=> __( 'Назва компанії', 'mrkv-ua-marketplaces' ),
				'callback'	=> array( $this->callbacks_rozetka, 'companyName' ),
				'page'		=> 'mrkv_ua_marketplaces_rozetka',
				'section'	=> 'mrkvuamp_rozetka_section',
				'args'		=> array(
					'label_for' => 'mrkv_uamrkpl_rozetka_company',
					'class'		=> 'mrkv_uamrkpl_class',
				)
			),
			array(
				'id'		=> 'mrkv_uamrkpl_rozetka_main_maker',
				'title'		=> __( 'Глобальний виробник', 'mrkv-ua-marketplaces' ),
				'callback'	=> array( $this->callbacks_rozetka, 'mainMaker' ),
				'page'		=> 'mrkv_ua_marketplaces_rozetka',
				'section'	=> 'mrkvuamp_rozetka_section',
				'args'		=> array(
					'label_for' => 'mrkv_uamrkpl_rozetka_main_maker',
					'class'		=> 'mrkv_uamrkpl_class',
				)
			),
			array(
				'id'		=> 'mrkv_uamrkpl_rozetka_brendNames',
				'title'		=> __( 'Бренди', 'mrkv-ua-marketplaces' ),
				'callback'	=> array( $this->callbacks_rozetka, 'brendNames' ),
				'page'		=> 'mrkv_ua_marketplaces_rozetka',
				'section'	=> 'mrkvuamp_rozetka_section',
				'args'		=> array(
					'label_for' => 'mrkv_uamrkpl_rozetka_brend_names',
					'class'		=> 'mrkv_uamrkpl_class',
				)
			)
		);

		$this->settings->setFields( $args );
	}

}
