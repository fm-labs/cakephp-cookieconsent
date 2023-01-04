<?php
declare(strict_types=1);

namespace Cookieconsent\View\Helper;

use Cake\Core\Configure;
use Cake\Utility\Hash;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Cookieconsent helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class CookieconsentHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        //'autoRender' => false,
        'palette' => [
            'popup' => ['background' => '#edeff5', 'text' => '#838391'],
            'button' => ['background' => '#4b81e8']
        ],
        'type' => 'info',
        'position' => 'bottom',
        'revokable' => false,
        'autoOpen' => true,
        'law' => ['countryCode' => 'AT', 'regionalLaw' => true],
        'location' => false,
//        'content' => [
//            'header' => 'Cookie consent',
//            'message' => 'This website uses cookies.',
//            'dismiss' => 'I agree',
//            'link' => 'Privacy terms',
//            'href' => '/privacy',
//        ],
        'cookie' => [
            'name' => 'cookie_law',
            'path' => '/',
            //'domain' => null,
            'expiryDays' => 365,
        ]
    ];

    public function __construct(View $view, array $config = [])
    {
        // i18n default config
        $config = Hash::merge([
            'content' => [
                'header' => __d('cookieconsent', 'Cookie consent'),
                'message' => __d('cookieconsent', 'This website uses cookies to provide a better user experience of our services.'),
                'dismiss' => __d('cookieconsent', 'I agree'),
                'link' => __d('cookieconsent', 'Privacy terms'),
                'href' => '/privacy',
            ],
        ], $config);
        parent::__construct($view, $config);
    }

    public function initialize(array $config): void
    {
        // config override
        if (!Configure::check('Cookieconsent')) {
            $this->setConfig(Configure::read('Cookieconsent'));
        }

        // load osana/cookieconsent libs
        $this->Html->css('Cookieconsent.cookieconsent.min.css', ['block' => 'css']);
        $this->Html->script('Cookieconsent.cookieconsent.min.js', ['block' => 'script']);
    }

    /**
     * Render cookie consent script block
     * and return result.
     *
     * @return string
     */
    public function render(): string {
        $scriptTemplate = <<<SCRIPT
    if (typeof window.cookieconsent !== "undefined") {
        window.cookieconsent.initialise(%s);
        window.cookieconsent.onStatusChange = function(status) {
            console.log(this.hasConsented() ?
                'cookie consent agreed' : 'cookie consent denied');
        };
    } else { console.warn("cookieconsent lib not loaded"); }
SCRIPT;
        $script = sprintf($scriptTemplate, json_encode($this->getConfig()));
        return $this->Html->scriptBlock($script);
    }
}
