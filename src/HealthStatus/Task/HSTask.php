<?php
declare(strict_types=1);

namespace HealthStatus\Task;

use HealthStatus\Main;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class HSTask extends Task{

	private $plugin;
	public function __construct(Main $plugin) {
		$this->plugin = $plugin;
	}

	public function onRun(int $currentTick) {
		foreach(Server::getInstance()->getOnlinePlayers() as $player) {
			$health = $this->plugin->settings->get("NameTag-Format");
			$health = str_replace("%CurrentHealth%", $player->getHealth(), $health);
			$player->setNameTagAlwaysVisible(true);
			$player->setScoreTag($health);
		}
	}
}