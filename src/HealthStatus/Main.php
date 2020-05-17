<?php
declare(strict_types=1);

namespace HealthStatus;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

/**
 * @property Config settings
 */
class Main extends PluginBase {


    private static $instance;

    public function onEnable(){
        self::$instance = $this;
		$this->getLogger()->info("HealthStatus is now Enabled!");
	}

    public static function getInstance(): self{
        return self::$instance;
    }

	public static function updateHealth(Player $player) {
	    $player->setScoreTag(str_repeat("§r§a|", $player->getHealth()) . str_repeat("§r§c|", $player->getMaxHealth() - $player->getHealth()));
    }
}
