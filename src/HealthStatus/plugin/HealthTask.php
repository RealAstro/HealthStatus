<?php


namespace HealthStatus\plugin;


use HealthStatus\Main;
use pocketmine\scheduler\Task;

/**
 * @property Main plugin
 */
class HealthTask extends Task
{

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function onRun(int $currentTick) {
        foreach (Main::getInstance()->getServer()->getOnlinePlayers() as $player) {
            $player->setNameTagAlwaysVisible();
            Main::updateHealth($player);
        }
    }

}