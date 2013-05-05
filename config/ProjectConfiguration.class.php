<?php

require_once '/Users/Titogelo/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
		$this->enablePlugins('sfDoctrinePlugin');
		$this->enablePlugins('sfFormExtraPlugin');
		$this->enablePlugins('sfDoctrineGuardPlugin');
		$this->enablePlugins('sfTCPDFPlugin');
		$this->enablePlugins('sfAdminGeneratorThemesPlugin');
	}
}
