<?php
	
/* 
Transit Plugin
Main Plugin Class
Author: Aaron Berkowitz, @asberk
*/

namespace Craft;

class TransitPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Transit');
	}
	
	function getVersion()
	{
		return '0.1';
	}
	
	function getDeveloper()
	{
		return 'Aaron Berkowitz';
	}
	
	function getDeveloperUrl()
	{
		return 'https://github.com/aberkie';
	}

	function hasCpSection()
	{
		return true;
	}

	function registerCpRoutes()
    {
        return array(
        'transit/edit\/(?P<stationId>\d+)' => 'transit/edit',
        );
    }

    protected function defineSettings()
	{
		return array(
			
			'apiToken' => array(AttributeType::Mixed, 'default' => ''),
		);
	}

    public function getSettingsHtml()
	{
		return craft()->templates->render('transit/settings', array(
			'settings' => $this->getSettings()
		));
	}
}