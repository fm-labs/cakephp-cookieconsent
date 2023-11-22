<?php
declare(strict_types=1);

namespace Cookieconsent;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;
use Cake\Event\EventInterface;
use Cake\Event\EventManager;
use Cake\View\View;


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

    /**
     * @param PluginApplicationInterface $app
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
        Configure::load('Cookieconsent.cookieconsent');
        if (\Cake\Core\Plugin::isLoaded("Settings")) {
            Configure::load('Cookieconsent', 'settings');
        }

        // Theme::requireViewBlock('cookieconsent', 'script')

        EventManager::instance()->on('View.beforeLayout', function(EventInterface $event) {
            /** @var View $view */
            $view = $event->getSubject();
            $Cookieconsent = $view->loadHelper("Cookieconsent.Cookieconsent");

            $autoRender = Configure::read('Cookieconsent.autoRender', false);
            $viewBlock = Configure::read('Cookieconsent.block', 'cookieconsent');
            if ($autoRender) {
                $script = $Cookieconsent->render();
                $view->append($viewBlock, $script);
            }
        });
    }
}
