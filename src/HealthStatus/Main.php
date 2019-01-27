<?php
declare(strict_types=1);

namespace HealthStatus;

use HealthStatus\Task\HSTask;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

/**
 * @property Config settings
 */
class Main extends PluginBase {

	public function onEnable(){
		$this->settings = new Config($this->getDataFolder().'config.yml', Config::YAML);
		$this->getLogger()->info("HealthStatus is now Enabled!");
		$this->getScheduler()->scheduleRepeatingTask(new HSTask($this), 20);;
	}

	public function onDisable(){
		$this->getLogger()->info("HealthStatus is now disabled");
		$this->settings->save();
	}
}