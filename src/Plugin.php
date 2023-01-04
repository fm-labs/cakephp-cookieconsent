<?php
declare(strict_types=1);

namespace Cookieconsent;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Routing\RouteBuilder;
use Cake\Core\PluginApplicationInterface;


/**
 * Class CookieconsentPlugin
 *
 * @package Cookieconsent
 */
class Plugin extends BasePlugin
{
    public function bootstrap(PluginApplicationInterface $app): void
    {
//        if (!Configure::check('Cookieconsent')) {
//            Configure::load('Cookieconsent.cookieconsent');
//        }
    }

    public function routes(RouteBuilder $routes): void
    {
    }
}
