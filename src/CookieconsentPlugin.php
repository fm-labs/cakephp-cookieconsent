<?php
declare(strict_types=1);

namespace Cookieconsent;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;


/**
 * Class CookieconsentPlugin
 *
 * @package Cookieconsent
 */
class CookieconsentPlugin extends BasePlugin
{
    /**
     * @var bool
     */
    public $bootstrapEnabled = true;

    /**
     * @var bool
     */
    public $routesEnabled = false;

    public function bootstrap(PluginApplicationInterface $app): void
    {
        Configure::load('Cookieconsent.cookieconsent');
        if (\Cake\Core\Plugin::isLoaded("Settings")) {
            Configure::load('Cookieconsent', 'settings');
        }
    }
}
