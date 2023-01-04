<?php
declare(strict_types=1);

namespace Cookieconsent\View\Helper;

use Cake\View\Helper;

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
        'content' => [
            'header' => 'Diese Webseite benutzt Cookies.',
            'message' => 'Diese Webseite benutzt Cookies um Ihnen die bestmögliche Nutzung unserer Services zu ermöglichen.',
            'dismiss' => 'Verstanden',
            'link' => 'Datenschutzerklärung',
            'href' => '/datenschutz',
        ],
        'cookie' => [
            'name' => 'cookie_law',
            'path' => '/',
            //'domain' => null,
            'expiryDays' => 365,
        ]
    ];

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->Html->css('Cookieconsent.cookieconsent.min.css', ['block' => 'css']);
        $this->Html->script('Cookieconsent.cookieconsent.min.js', ['block' => 'script']);
    }

    public function render() {
        $scriptTemplate = <<<SCRIPT
    window.cookieconsent.initialise(%s);
    window.cookieconsent.onStatusChange = function(status) {
        console.log(this.hasConsented() ?
            'enable cookies' : 'disable cookies');
    };
SCRIPT;
        $script = sprintf($scriptTemplate, json_encode($this->getConfig()));
        return $this->Html->scriptBlock($script);
    }
}
